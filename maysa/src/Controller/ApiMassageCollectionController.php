<?php

namespace App\Controller;

use App\Entity\MassageCollection;
use App\Repository\MassageCollectionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ApiMassageCollectionController extends AbstractController
{
    #[Route('/api/massage/collections', name: 'app_api_massage_collections')]
    public function collections(MassageCollectionRepository $collectionRepository): Response
    {
        $collections = $collectionRepository->findAll();
        $data = [];
        foreach ($collections as $collection) {
            $data[] = [
                'id' => $collection->getId(),
                'name' => $collection->getName(),
                'description' => $collection->getDescription(),
                'icon' => $collection->getIcon(),
                'position' => $collection->getPosition()
            ];
        }
        return new JsonResponse($data);
    }
}
