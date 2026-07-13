<?php

namespace App\Entity;

use App\Repository\MassageTranslationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MassageTranslationRepository::class)]
#[ORM\UniqueConstraint(
    name: 'unique_massage_locale',
    columns: ['massage_id', 'locale'],
)]
#[ORM\Index(
    name: 'idx_locale',
    columns: ['locale'],
)]
class MassageTranslation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 5)]
    private ?string $locale = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $subtitle = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'massageTranslations')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?Massage $massage = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocale(): ?string
    {
        return $this->locale;
    }

    public function setLocale(string $locale): static
    {
        $this->locale = $locale;

        return $this;
    }

    public function getSubtitle(): ?string
    {
        return $this->subtitle;
    }

    public function setSubtitle(?string $subtitle): static
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getMassage(): ?Massage
    {
        return $this->massage;
    }

    public function setMassage(?Massage $massage): static
    {
        $this->massage = $massage;

        return $this;
    }
}
