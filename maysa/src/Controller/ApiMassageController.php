<?php

namespace App\Controller;

use App\Repository\MassageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

final class ApiMassageController extends AbstractController
{
    #[Route('/api/massages', name: 'app_api_massage')]
    public function index(
        MassageRepository $massageRepository,
        Request $request
    ): Response
    {
        $massages = $massageRepository->findAll();
        $locale = $request->getPreferredLanguage(['es', 'en']) ?? 'es';

        $data = [];

        foreach ($massages as $massage) {
            $translation = $massage->findTranslation($locale);
            $data[] = [
                'id' => $massage->getId(),
                'name' => $massage->getName(),
                'subtitle' => $translation?->getSubtitle() ?? $massage->getSubtitle(),
                'description' => $translation?->getDescription() ?? $massage->getDescription(),
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
    public function show(
        MassageRepository $massageRepository,
        int $id,
        Request $request
    ): Response
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

        $locale = $request->getPreferredLanguage(['es', 'en']) ?? 'es';

        $translation = $massage->findTranslation($locale);
        $data = [
            'id' => $massage->getId(),
            'name' => $massage->getName(),
            'subtitle' => $translation?->getSubtitle() ?? $massage->getSubtitle(),
            'description' => $translation?->getDescription() ?? $massage->getDescription(),
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
