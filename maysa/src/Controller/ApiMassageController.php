<?php

namespace App\Controller;

use App\Repository\MassageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Mapper\MassageMapper;

final class ApiMassageController extends AbstractController
{
    #[Route('/api/massages', name: 'app_api_massage', methods: ['GET'])]
    public function index(
        MassageRepository $massageRepository,
        Request $request,
        MassageMapper $massageMapper
    ): JsonResponse
    {
        $massages = $massageRepository->findAll();
        $locale = $request->getPreferredLanguage(['es', 'en']) ?? 'es';

        return new JsonResponse(
            $massageMapper->mapCollection($massages, $locale)
        );
    }

    #[Route('/api/massages/{id}', name: 'app_id_massage', methods: ['GET'])]
    public function show(
        MassageRepository $massageRepository,
        int $id,
        Request $request,
        MassageMapper $massageMapper
    ): JsonResponse
    {
        $massage = $massageRepository->find($id);

        if (!$massage) {
            return new JsonResponse([
                'error' => 'Massage not found'
            ], 404);
        }

        $locale = $request->getPreferredLanguage(['es', 'en']) ?? 'es';

        return new JsonResponse(
            $massageMapper->map($massage, $locale, true)
        );
    }
}
