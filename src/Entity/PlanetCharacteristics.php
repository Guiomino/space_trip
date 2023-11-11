<?php

namespace App\Entity;

use App\Repository\PlanetCharacteristicsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlanetCharacteristicsRepository::class)]
class PlanetCharacteristics
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $main_gaz = null;

    #[ORM\Column(length: 50)]
    private ?string $temperature = null;

    #[ORM\Column(length: 50)]
    private ?string $gravity = null;

    #[ORM\Column(length: 50)]
    private ?string $irradiance = null;

    #[ORM\Column(length: 80)]
    private ?string $semi_major_axis = null;

    #[ORM\Column(length: 80)]
    private ?string $revolution_period = null;

    #[ORM\Column(length: 80)]
    private ?string $orbital_circumference = null;

    #[ORM\Column(length: 80)]
    private ?string $max_orbital_speed = null;

    #[ORM\Column(length: 80)]
    private ?string $mass = null;

    #[ORM\Column(length: 80)]
    private ?string $equatorial_perimeter = null;

    #[ORM\Column(length: 80)]
    private ?string $surface_gravity = null;

    #[ORM\Column(length: 80)]
    private ?string $rotation_period = null;

    #[ORM\Column(length: 80)]
    private ?string $rotation_speed = null;

    #[ORM\Column(length: 80)]
    private ?string $solar_irradiance = null;

    #[ORM\Column(length: 80)]
    private ?string $max_surface_temperature = null;

    #[ORM\Column(length: 80)]
    private ?string $min_surface_temperature = null;

    #[ORM\Column(length: 10)]
    private ?string $carbon_dioxide = null;

    #[ORM\Column(length: 10)]
    private ?string $argon = null;

    #[ORM\Column(length: 10)]
    private ?string $dinitrogen = null;

    #[ORM\Column(length: 10)]
    private ?string $dioxygen = null;

    #[ORM\OneToMany(mappedBy: 'planet_characteristics', targetEntity: Planet::class)]
    private Collection $planets;

    public function __construct()
    {
        $this->planets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMainGaz(): ?string
    {
        return $this->main_gaz;
    }

    public function setMainGaz(string $main_gaz): static
    {
        $this->main_gaz = $main_gaz;

        return $this;
    }

    public function getTemperature(): ?string
    {
        return $this->temperature;
    }

    public function setTemperature(string $temperature): static
    {
        $this->temperature = $temperature;

        return $this;
    }

    public function getGravity(): ?string
    {
        return $this->gravity;
    }

    public function setGravity(string $gravity): static
    {
        $this->gravity = $gravity;

        return $this;
    }

    public function getIrradiance(): ?string
    {
        return $this->irradiance;
    }

    public function setIrradiance(string $irradiance): static
    {
        $this->irradiance = $irradiance;

        return $this;
    }

    public function getSemiMajorAxis(): ?string
    {
        return $this->semi_major_axis;
    }

    public function setSemiMajorAxis(string $semi_major_axis): static
    {
        $this->semi_major_axis = $semi_major_axis;

        return $this;
    }

    public function getRevolutionPeriod(): ?string
    {
        return $this->revolution_period;
    }

    public function setRevolutionPeriod(string $revolution_period): static
    {
        $this->revolution_period = $revolution_period;

        return $this;
    }

    public function getOrbitalCircumference(): ?string
    {
        return $this->orbital_circumference;
    }

    public function setOrbitalCircumference(string $orbital_circumference): static
    {
        $this->orbital_circumference = $orbital_circumference;

        return $this;
    }

    public function getMaxOrbitalSpeed(): ?string
    {
        return $this->max_orbital_speed;
    }

    public function setMaxOrbitalSpeed(string $max_orbital_speed): static
    {
        $this->max_orbital_speed = $max_orbital_speed;

        return $this;
    }

    public function getMass(): ?string
    {
        return $this->mass;
    }

    public function setMass(string $mass): static
    {
        $this->mass = $mass;

        return $this;
    }

    public function getEquatorialPerimeter(): ?string
    {
        return $this->equatorial_perimeter;
    }

    public function setEquatorialPerimeter(string $equatorial_perimeter): static
    {
        $this->equatorial_perimeter = $equatorial_perimeter;

        return $this;
    }

    public function getSurfaceGravity(): ?string
    {
        return $this->surface_gravity;
    }

    public function setSurfaceGravity(string $surface_gravity): static
    {
        $this->surface_gravity = $surface_gravity;

        return $this;
    }

    public function getRotationPeriod(): ?string
    {
        return $this->rotation_period;
    }

    public function setRotationPeriod(string $rotation_period): static
    {
        $this->rotation_period = $rotation_period;

        return $this;
    }

    public function getRotationSpeed(): ?string
    {
        return $this->rotation_speed;
    }

    public function setRotationSpeed(string $rotation_speed): static
    {
        $this->rotation_speed = $rotation_speed;

        return $this;
    }

    public function getSolarIrradiance(): ?string
    {
        return $this->solar_irradiance;
    }

    public function setSolarIrradiance(string $solar_irradiance): static
    {
        $this->solar_irradiance = $solar_irradiance;

        return $this;
    }

    public function getMaxSurfaceTemperature(): ?string
    {
        return $this->max_surface_temperature;
    }

    public function setMaxSurfaceTemperature(string $max_surface_temperature): static
    {
        $this->max_surface_temperature = $max_surface_temperature;

        return $this;
    }

    public function getMinSurfaceTemperature(): ?string
    {
        return $this->min_surface_temperature;
    }

    public function setMinSurfaceTemperature(string $min_surface_temperature): static
    {
        $this->min_surface_temperature = $min_surface_temperature;

        return $this;
    }

    public function getCarbonDioxide(): ?string
    {
        return $this->carbon_dioxide;
    }

    public function setCarbonDioxide(string $carbon_dioxide): static
    {
        $this->carbon_dioxide = $carbon_dioxide;

        return $this;
    }

    public function getArgon(): ?string
    {
        return $this->argon;
    }

    public function setArgon(string $argon): static
    {
        $this->argon = $argon;

        return $this;
    }

    public function getDinitrogen(): ?string
    {
        return $this->dinitrogen;
    }

    public function setDinitrogen(string $dinitrogen): static
    {
        $this->dinitrogen = $dinitrogen;

        return $this;
    }

    public function getDioxygen(): ?string
    {
        return $this->dioxygen;
    }

    public function setDioxygen(string $dioxygen): static
    {
        $this->dioxygen = $dioxygen;

        return $this;
    }

    /**
     * @return Collection<int, Planet>
     */
    public function getPlanets(): Collection
    {
        return $this->planets;
    }

    public function addPlanet(Planet $planet): static
    {
        if (!$this->planets->contains($planet)) {
            $this->planets->add($planet);
            $planet->setPlanetCharacteristics($this);
        }

        return $this;
    }

    public function removePlanet(Planet $planet): static
    {
        if ($this->planets->removeElement($planet)) {
            // set the owning side to null (unless already changed)
            if ($planet->getPlanetCharacteristics() === $this) {
                $planet->setPlanetCharacteristics(null);
            }
        }

        return $this;
    }
}
