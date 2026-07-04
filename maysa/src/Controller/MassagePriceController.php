<?php

namespace App\Controller;

use App\Entity\MassagePrice;
use App\Form\MassagePriceType;
use App\Repository\MassagePriceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/massage/price')]
final class MassagePriceController extends AbstractController
{
    #[Route(name: 'app_massage_price_index', methods: ['GET'])]
    public function index(MassagePriceRepository $massagePriceRepository): Response
    {
        return $this->render('massage_price/index.html.twig', [
            'massage_prices' => $massagePriceRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_massage_price_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $massagePrice = new MassagePrice();
        $form = $this->createForm(MassagePriceType::class, $massagePrice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($massagePrice);
            $entityManager->flush();

            return $this->redirectToRoute('app_massage_price_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('massage_price/new.html.twig', [
            'massage_price' => $massagePrice,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_massage_price_show', methods: ['GET'])]
    public function show(MassagePrice $massagePrice): Response
    {
        return $this->render('massage_price/show.html.twig', [
            'massage_price' => $massagePrice,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_massage_price_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, MassagePrice $massagePrice, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MassagePriceType::class, $massagePrice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_massage_price_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('massage_price/edit.html.twig', [
            'massage_price' => $massagePrice,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_massage_price_delete', methods: ['POST'])]
    public function delete(Request $request, MassagePrice $massagePrice, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$massagePrice->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($massagePrice);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_massage_price_index', [], Response::HTTP_SEE_OTHER);
    }
}
