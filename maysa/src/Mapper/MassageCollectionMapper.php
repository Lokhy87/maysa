<?php

declare(strict_types=1);

namespace App\Mapper;

use App\Entity\MassageCollection;

final class MassageCollectionMapper
{
    public function map(
        MassageCollection $collection,
        string $locale
    ): array {
        $translation = $collection->findTranslation($locale);

        return [
            'id' => $collection->getId(),
            'name' => $collection->getName(),
            'description' => $translation?->getDescription()
                ?? $collection->getDescription(),
            'icon' => $collection->getIcon(),
            'position' => $collection->getPosition(),
        ];
    }

    public function mapCollection(
        iterable $collections,
        string $locale
    ): array {
        $data = [];

        foreach ($collections as $collection) {
            $data[] = $this->map($collection, $locale);
        }

        return $data;
    }


}
