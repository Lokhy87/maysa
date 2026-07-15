<?php

declare(strict_types=1);

namespace App\Mapper;

use App\Entity\Massage;

final class MassageMapper
{
    public function map(
        Massage $massage,
        string $locale,
        bool $includePrices = false
    ): array
    {
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
        ];

        if ($includePrices) {
            $prices = [];

            foreach ($massage->getMassagePrices() as $price) {
                $prices[] = [
                    'duration' => $price->getDuration(),
                    'price' => $price->getPrice(),
                ];
            }

            $data['prices'] = $prices;
        }

        return $data;
    }

    public function mapCollection(iterable $massages, string $locale): array
    {
        $data = [];

        foreach ($massages as $massage) {
            $data[] = $this->map($massage, $locale);
        }

        return $data;
    }
}
