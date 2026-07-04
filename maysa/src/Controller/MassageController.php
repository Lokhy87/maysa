<?php

namespace App\Controller;

use App\Entity\Massage;
use App\Form\MassageType;
use App\Repository\MassageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/massage')]
final class MassageController extends AbstractController
{
    #[Route(name: 'app_massage_index', methods: ['GET'])]
    public function index(MassageRepository $massageRepository): Response
    {
        return $this->render('massage/index.html.twig', [
            'massages' => $massageRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_massage_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $massage = new Massage();
        $form = $this->createForm(MassageType::class, $massage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($massage);
            $entityManager->flush();

            return $this->redirectToRoute('app_massage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('massage/new.html.twig', [
            'massage' => $massage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_massage_show', methods: ['GET'])]
    public function show(Massage $massage): Response
    {
        return $this->render('massage/show.html.twig', [
            'massage' => $massage,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_massage_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Massage $massage, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MassageType::class, $massage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_massage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('massage/edit.html.twig', [
            'massage' => $massage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_massage_delete', methods: ['POST'])]
    public function delete(Request $request, Massage $massage, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$massage->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($massage);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_massage_index', [], Response::HTTP_SEE_OTHER);
    }
}
