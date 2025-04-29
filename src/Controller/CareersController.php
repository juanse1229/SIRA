<?php

namespace App\Controller;

use App\Entity\Careers;
use App\Form\CareersType;
use App\Repository\CareersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/careers')]
final class CareersController extends AbstractController
{
    #[Route(name: 'app_careers_index', methods: ['GET'])]
    public function index(CareersRepository $careersRepository): Response
    {
        return $this->render('careers/index.html.twig', [
            'careers' => $careersRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_careers_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $career = new Careers();
        $form = $this->createForm(CareersType::class, $career);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($career);
            $entityManager->flush();

            return $this->redirectToRoute('app_careers_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('careers/new.html.twig', [
            'career' => $career,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_careers_show', methods: ['GET'])]
    public function show(Careers $career): Response
    {
        return $this->render('careers/show.html.twig', [
            'career' => $career,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_careers_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Careers $career, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CareersType::class, $career);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_careers_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('careers/edit.html.twig', [
            'career' => $career,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_careers_delete', methods: ['POST'])]
    public function delete(Request $request, Careers $career, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$career->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($career);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_careers_index', [], Response::HTTP_SEE_OTHER);
    }
}
