<?php

namespace App\Entity;

use App\Repository\PlanetRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlanetRepository::class)]
class Planet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $precaution = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $image = null;

    #[ORM\ManyToOne(inversedBy: 'planets')]
    #[ORM\JoinColumn(nullable: false)]
    private ?PlanetCharacteristics $planet_characteristics = null;

    #[ORM\ManyToOne(inversedBy: 'planets')]
    #[ORM\JoinColumn(nullable: false)]
    private ?PointsOfInterest $points_of_interest = null;

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

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrecaution(): ?string
    {
        return $this->precaution;
    }

    public function setPrecaution(string $precaution): static
    {
        $this->precaution = $precaution;

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

    public function getPlanetCharacteristics(): ?PlanetCharacteristics
    {
        return $this->planet_characteristics;
    }

    public function setPlanetCharacteristics(?PlanetCharacteristics $planet_characteristics): static
    {
        $this->planet_characteristics = $planet_characteristics;

        return $this;
    }

    public function getPointsOfInterest(): ?PointsOfInterest
    {
        return $this->points_of_interest;
    }

    public function setPointsOfInterest(?PointsOfInterest $points_of_interest): static
    {
        $this->points_of_interest = $points_of_interest;

        return $this;
    }
}
