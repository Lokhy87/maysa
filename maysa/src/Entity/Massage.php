<?php

namespace App\Entity;

use App\Repository\MassageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MassageRepository::class)]
class Massage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $subtitle = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    #[ORM\Column]
    private ?bool $active = true;

    #[ORM\Column]
    private ?int $position = 0;

    #[ORM\ManyToOne(inversedBy: 'massages')]
    #[ORM\JoinColumn(nullable: false)]
    private ?MassageCollection $collection = null;

    /**
     * @var Collection<int, MassagePrice>
     */
    #[ORM\OneToMany(targetEntity: MassagePrice::class, mappedBy: 'massage')]
    private Collection $massagePrices;

    public function __construct()
    {
        $this->massagePrices = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSubtitle(): ?string
    {
        return $this->subtitle;
    }

    public function setSubtitle(string $subtitle): static
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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): static
    {
        $this->active = $active;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): static
    {
        $this->position = $position;

        return $this;
    }

    public function getCollection(): ?MassageCollection
    {
        return $this->collection;
    }

    public function setCollection(?MassageCollection $collection): static
    {
        $this->collection = $collection;

        return $this;
    }

    /**
     * @return Collection<int, MassagePrice>
     */
    public function getMassagePrices(): Collection
    {
        return $this->massagePrices;
    }

    public function addMassagePrice(MassagePrice $massagePrice): static
    {
        if (!$this->massagePrices->contains($massagePrice)) {
            $this->massagePrices->add($massagePrice);
            $massagePrice->setMassage($this);
        }

        return $this;
    }

    public function removeMassagePrice(MassagePrice $massagePrice): static
    {
        if ($this->massagePrices->removeElement($massagePrice)) {
            // set the owning side to null (unless already changed)
            if ($massagePrice->getMassage() === $this) {
                $massagePrice->setMassage(null);
            }
        }

        return $this;
    }
}
