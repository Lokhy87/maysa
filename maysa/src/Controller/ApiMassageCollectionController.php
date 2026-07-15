<?php

namespace App\Controller;

use App\Entity\MassageCollection;
use App\Repository\MassageCollectionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use App\Mapper\MassageCollectionMapper;


final class ApiMassageCollectionController extends AbstractController
{
    #[Route('/api/massage/collections', name: 'app_api_massage_collections')]
    public function collections(
        MassageCollectionRepository $collectionRepository,
        Request $request,
        MassageCollectionMapper $massageCollectionMapper,
    ): JsonResponse
    {
        $collections = $collectionRepository->findAll();

        $locale = $request->getPreferredLanguage(['es', 'en']) ?? 'es';

        return new JsonResponse(
            $massageCollectionMapper->mapCollection($collections, $locale)
        );
    }
}
