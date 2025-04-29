<?php

namespace App\Controller;

use App\Repository\SubjectsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/subjects')]
final class SubjectsController extends AbstractController
{
    #[Route('/pending', name: 'app_subjects_pending', methods: ['GET'])]
    public function pending(SubjectsRepository $subjectsRepository): Response
    {
        // Obtener el usuario actual
        $user = $this->getUser();

        // Obtener las materias disponibles para el usuario, excluyendo las que no cumplen los prerrequisitos
        $availableSubjects = $subjectsRepository->getAvailableSubjectsForUser($user->getId());

        // Pasar las materias disponibles a la vista
        return $this->render('subjects/pending.html.twig', [
            'subjects' => $availableSubjects,
        ]);
    }

    #[Route("/continue", name: "app_subjects_continue", methods: ['POST'])]
    public function continue(Request $request): Response
    {
        $subjects = $request->request->all('subjects');
        // dd($subjects);
        $request->getSession()->set('subjects',$subjects);

        return $this->redirectToRoute('app_schedules_available');
        // return $this->render('subjects/control.html.twig', ['subjects'=>$subjects]);
    }

    #[Route('/subjects/validate-prerequisites', name: 'app_subjects_validate_prerequisites', methods: ['POST'])]
    public function validatePrerequisitesAndContinue(Request $request, UsersSubjectsRepository $usersSubjectsRepo): Response
    {
        $user = $this->getUser();
        $selectedSubjects = $request->request->get('subjects', []);

        foreach ($selectedSubjects as $subjectId) {
            $subject = $this->getDoctrine()->getRepository(Subjects::class)->find($subjectId);
            $prerequisite = $subject->getPrerequisites();

            if ($prerequisite && !$usersSubjectsRepo->hasCompletedSubject($user->getId(), $prerequisite->getId())) {
                $this->addFlash('error', sprintf(
                    'No puedes seleccionar %s sin haber completado su prerrequisito %s.',
                    $subject->getName(),
                    $prerequisite->getName()
                ));
                return $this->redirectToRoute('app_subjects_pending');
            }
        }

        return $this->redirectToRoute('app_subjects_success');
    }
}
