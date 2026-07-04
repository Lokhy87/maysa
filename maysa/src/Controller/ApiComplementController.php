<?php

namespace App\Controller;

use App\Repository\ComplementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ApiComplementController extends AbstractController
{
    #[Route('/api/complements', name: 'app_api_complements')]
    public function complements(ComplementRepository $complementRepository): Response
    {
        $complements = $complementRepository->findAll();

$data = [];

foreach ($complements as $complement) {
    $data[] = [
        'id' => $complement->getId(),
        'category' => $complement->getCategory(),
        'name' => $complement->getName(),
        'description' => $complement->getDescription(),
        'price' => $complement->getPrice(),
    ];
}
return new JsonResponse($data);
}
}
