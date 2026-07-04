<?php

namespace App\Controller;

use App\Entity\MassageCollection;
use App\Form\MassageCollectionType;
use App\Repository\MassageCollectionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/massage/collection')]
final class MassageCollectionController extends AbstractController
{
    #[Route(name: 'app_massage_collection_index', methods: ['GET'])]
    public function index(MassageCollectionRepository $massageCollectionRepository): Response
    {
        return $this->render('massage_collection/index.html.twig', [
            'massage_collections' => $massageCollectionRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_massage_collection_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $massageCollection = new MassageCollection();
        $form = $this->createForm(MassageCollectionType::class, $massageCollection);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($massageCollection);
            $entityManager->flush();

            return $this->redirectToRoute('app_massage_collection_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('massage_collection/new.html.twig', [
            'massage_collection' => $massageCollection,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_massage_collection_show', methods: ['GET'])]
    public function show(MassageCollection $massageCollection): Response
    {
        return $this->render('massage_collection/show.html.twig', [
            'massage_collection' => $massageCollection,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_massage_collection_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, MassageCollection $massageCollection, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MassageCollectionType::class, $massageCollection);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_massage_collection_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('massage_collection/edit.html.twig', [
            'massage_collection' => $massageCollection,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_massage_collection_delete', methods: ['POST'])]
    public function delete(Request $request, MassageCollection $massageCollection, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$massageCollection->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($massageCollection);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_massage_collection_index', [], Response::HTTP_SEE_OTHER);
    }
}
