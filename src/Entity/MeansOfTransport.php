<?php

namespace App\Entity;

use App\Repository\MeansOfTransportRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MeansOfTransportRepository::class)]
class MeansOfTransport
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $model = null;

    #[ORM\Column(length: 80)]
    private ?string $engine_type = null;

    #[ORM\Column(length: 80)]
    private ?string $power_system = null;

    #[ORM\Column(length: 80)]
    private ?string $navigation_system = null;

    #[ORM\Column(length: 80)]
    private ?string $survival_system = null;

    #[ORM\Column(length: 80)]
    private ?string $antirad_system = null;

    #[ORM\Column]
    private ?int $max_speed = null;

    #[ORM\Column(length: 80)]
    private ?string $autonomy = null;

    #[ORM\Column(length: 80)]
    private ?string $pressurization = null;

    #[ORM\Column(length: 80)]
    private ?string $off_road_capability = null;

    #[ORM\Column(length: 80)]
    private ?string $altitude = null;

    #[ORM\Column(length: 80)]
    private ?string $underwater_map_system = null;

    #[ORM\Column]
    private ?int $capacity = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $image = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): static
    {
        $this->model = $model;

        return $this;
    }

    public function getEngineType(): ?string
    {
        return $this->engine_type;
    }

    public function setEngineType(string $engine_type): static
    {
        $this->engine_type = $engine_type;

        return $this;
    }

    public function getPowerSystem(): ?string
    {
        return $this->power_system;
    }

    public function setPowerSystem(string $power_system): static
    {
        $this->power_system = $power_system;

        return $this;
    }

    public function getNavigationSystem(): ?string
    {
        return $this->navigation_system;
    }

    public function setNavigationSystem(string $navigation_system): static
    {
        $this->navigation_system = $navigation_system;

        return $this;
    }

    public function getSurvivalSystem(): ?string
    {
        return $this->survival_system;
    }

    public function setSurvivalSystem(string $survival_system): static
    {
        $this->survival_system = $survival_system;

        return $this;
    }

    public function getAntiradSystem(): ?string
    {
        return $this->antirad_system;
    }

    public function setAntiradSystem(string $antirad_system): static
    {
        $this->antirad_system = $antirad_system;

        return $this;
    }

    public function getMaxSpeed(): ?int
    {
        return $this->max_speed;
    }

    public function setMaxSpeed(int $max_speed): static
    {
        $this->max_speed = $max_speed;

        return $this;
    }

    public function getAutonomy(): ?string
    {
        return $this->autonomy;
    }

    public function setAutonomy(string $autonomy): static
    {
        $this->autonomy = $autonomy;

        return $this;
    }

    public function getPressurization(): ?string
    {
        return $this->pressurization;
    }

    public function setPressurization(string $pressurization): static
    {
        $this->pressurization = $pressurization;

        return $this;
    }

    public function getOffRoadCapability(): ?string
    {
        return $this->off_road_capability;
    }

    public function setOffRoadCapability(string $off_road_capability): static
    {
        $this->off_road_capability = $off_road_capability;

        return $this;
    }

    public function getAltitude(): ?string
    {
        return $this->altitude;
    }

    public function setAltitude(string $altitude): static
    {
        $this->altitude = $altitude;

        return $this;
    }

    public function getUnderwaterMapSystem(): ?string
    {
        return $this->underwater_map_system;
    }

    public function setUnderwaterMapSystem(string $underwater_map_system): static
    {
        $this->underwater_map_system = $underwater_map_system;

        return $this;
    }

    public function getCapacity(): ?int
    {
        return $this->capacity;
    }

    public function setCapacity(int $capacity): static
    {
        $this->capacity = $capacity;

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
}
