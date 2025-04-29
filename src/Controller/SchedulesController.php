<?php

namespace App\Controller;

use App\Entity\Schedules;
use App\Form\SchedulesType;
use App\Repository\SchedulesRepository;
use Doctrine\ORM\EntityManagerInterface;
use PhpParser\Node\Expr\Cast\Array_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

#[Route('/schedules')]
final class SchedulesController extends AbstractController
{
    #[Route(name: 'app_schedules_index', methods: ['GET'])]
    public function index(SchedulesRepository $schedulesRepository): Response
    {
        return $this->render('schedules/index.html.twig', [
            'schedules' => $schedulesRepository->findAll(),
        ]);
    }

    #[Route('/available', name: 'app_schedules_available', methods: ['GET'])]
    public function available(SchedulesRepository $schedulesRepository, Request $request): Response
    {
        $subjects = $request->getSession()->get('subjects', []);
        $availableSchedules =  $schedulesRepository->findAvailableSchedules($subjects);
        # dd($availableSchedules);

        return $this->render('schedules/available.html.twig', [
            'schedules' => $availableSchedules,
        ]);
    }

    #[Route("/validate", name: "app_schedules_validate", methods: ['POST'])]
    public function validate(Request $request, SchedulesRepository $schedulesRepository, EntityManagerInterface $entityManager): Response
    {
        // Retrieve the selected schedules from the form
        $selectedSchedules = $request->request->all('schedules');

        // Validate the data
        if (empty($selectedSchedules)) {
            $this->addFlash('error', 'No se seleccionaron horarios. Intenta de nuevo.');
            return $this->redirectToRoute('app_schedules_available');
        }

        // Get the entity manager and repository for subjects
        $subjectsRepository = $entityManager->getRepository('App\Entity\Subjects');

        // Fetch the full schedule details for the selected IDs
        $schedules = $schedulesRepository->findBy(['id' => $selectedSchedules]);

        // Transform the data into the required format
        $formattedSchedules = [];
        foreach ($schedules as $schedule) {
            // Get the subject name using the subject_id
            $subject = $subjectsRepository->find($schedule->getSubjectId());
            $subjectName = $subject ? $subject->getName() : 'Unknown Subject';

            $formattedSchedules[] = [
                'day' => $schedule->getDay(),
                'startTime' => $schedule->getStartTime()->format('H:i'),
                'endTime' => $schedule->getEndTime()->format('H:i'),
                'subject' => $subjectName,
            ];
        }

        // Store the formatted data in the session
        $request->getSession()->set('schedules', $formattedSchedules);

        // Redirect to the final schedule view
        return $this->redirectToRoute('app_schedules_final');
    }

    #[Route('/final-schedule', name: 'app_schedules_final', methods: ['GET'])]
    public function finalSchedule(Request $request): Response
    {
        // Get the raw schedule data from the session
        $rawSchedules = $request->getSession()->get('schedules', []);
        // dd($rawSchedules);
        // Ensure data is an array
        if (!is_array(value: $rawSchedules)) {
            $this->addFlash('error', 'Invalid schedule data format.');
            return $this->redirectToRoute('app_schedules_available');
        }
        
        // Pass the raw data directly to the template without transformation
        return $this->render('schedules/finalSchedule.html.twig', [
            'finalSchedules' => $rawSchedules,
        ]);
    }


    // #[Route('/new', name: 'app_schedules_new', methods: ['GET', 'POST'])]
    // public function new(Request $request, EntityManagerInterface $entityManager): Response
    // {
    //     $schedule = new Schedules();
    //     $form = $this->createForm(SchedulesType::class, $schedule);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $entityManager->persist($schedule);
    //         $entityManager->flush();

    //         return $this->redirectToRoute('app_schedules_index', [], Response::HTTP_SEE_OTHER);
    //     }

    //     return $this->render('schedules/new.html.twig', [
    //         'schedule' => $schedule,
    //         'form' => $form,
    //     ]);
    // }

    // #[Route('/{id}', name: 'app_schedules_show', methods: ['GET'])]
    // public function show(Schedules $schedule): Response
    // {
    //     return $this->render('schedules/show.html.twig', [
    //         'schedule' => $schedule,
    //     ]);
    // }

    // #[Route('/{id}/edit', name: 'app_schedules_edit', methods: ['GET', 'POST'])]
    // public function edit(Request $request, Schedules $schedule, EntityManagerInterface $entityManager): Response
    // {
    //     $form = $this->createForm(SchedulesType::class, $schedule);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $entityManager->flush();

    //         return $this->redirectToRoute('app_schedules_index', [], Response::HTTP_SEE_OTHER);
    //     }

    //     return $this->render('schedules/edit.html.twig', [
    //         'schedule' => $schedule,
    //         'form' => $form,
    //     ]);
    // }

    // #[Route('/{id}', name: 'app_schedules_delete', methods: ['POST'])]
    // public function delete(Request $request, Schedules $schedule, EntityManagerInterface $entityManager): Response
    // {
    //     if ($this->isCsrfTokenValid('delete' . $schedule->getId(), $request->getPayload()->getString('_token'))) {
    //         $entityManager->remove($schedule);
    //         $entityManager->flush();
    //     }

    //     return $this->redirectToRoute('app_schedules_index', [], Response::HTTP_SEE_OTHER);
    // }
}
