<?php

namespace App\Controller;

use App\Repository\MassageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ApiMassageController extends AbstractController
{
    #[Route('/api/massages', name: 'app_api_massage')]
    public function index(MassageRepository $massageRepository): Response
    {
        $massages = $massageRepository->findAll();

        $data = [];

        foreach ($massages as $massage) {
            $data[] = [
                'id' => $massage->getId(),
                'name' => $massage->getName(),
                'subtitle' => $massage->getSubtitle(),
                'description' => $massage->getDescription(),
                'image' => $massage->getImage(),
                'active' => $massage->isActive(),
                'position' => $massage->getPosition(),
                'collection' => [
                    'id' => $massage->getCollection()->getId(),
                    'name' => $massage->getCollection()->getName(),
                ],
            ];
        }
        return new JsonResponse($data);
    }

    #[Route('/api/massages/{id}', name: 'app_id_massage')]
    public function massage_id(MassageRepository $massageRepository,
    int $id): Response
    {
        $massage = $massageRepository->find($id);

        if (!$massage) {
            return new JsonResponse([
                'error' => 'Massage not found'
            ], 404);
        }

        $prices = [];
        foreach ($massage->getMassagePrices() as $price) {
            $prices[] = [
                'duration' => $price->getDuration(),
                'price' => $price->getPrice(),
            ];
        }

        $data = [
            'id' => $massage->getId(),
            'name' => $massage->getName(),
            'subtitle' => $massage->getSubtitle(),
            'description' => $massage->getDescription(),
            'image' => $massage->getImage(),
            'active' => $massage->isActive(),
            'position' => $massage->getPosition(),
            'collection' => [
                'id' => $massage->getCollection()->getId(),
                'name' => $massage->getCollection()->getName(),
            ],
            'prices' => $prices
        ];
        return new JsonResponse($data);
    }
}
