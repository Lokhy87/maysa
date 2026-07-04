<?php

namespace App\Entity;

use App\Repository\MassageCollectionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MassageCollectionRepository::class)]
class MassageCollection
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $icon = null;

    #[ORM\Column(type: 'integer', options: ['default' => 0])]
    private int $position = 0;

    /**
     * @var Collection<int, Massage>
     */
    #[ORM\OneToMany(targetEntity: Massage::class, mappedBy: 'collection')]
    private Collection $massages;

    public function __construct()
    {
        $this->massages = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(?string $icon): static
    {
        $this->icon = $icon;

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

    /**
     * @return Collection<int, Massage>
     */
    public function getMassages(): Collection
    {
        return $this->massages;
    }

    public function addMassage(Massage $massage): static
    {
        if (!$this->massages->contains($massage)) {
            $this->massages->add($massage);
            $massage->setCollection($this);
        }

        return $this;
    }

    public function removeMassage(Massage $massage): static
    {
        if ($this->massages->removeElement($massage)) {
            // set the owning side to null (unless already changed)
            if ($massage->getCollection() === $this) {
                $massage->setCollection(null);
            }
        }

        return $this;
    }
}
