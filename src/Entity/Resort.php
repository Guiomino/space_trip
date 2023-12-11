<?php

namespace App\Entity;

use App\Repository\ResortRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResortRepository::class)]
class Resort
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 80)]
    private ?string $place = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $area = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $starting_price = null;

    #[ORM\Column]
    private ?int $order_number = null;

    #[ORM\Column(length: 5)]
    private ?string $stars = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $image = null;

    #[ORM\OneToMany(mappedBy: 'resort', targetEntity: Stay::class)]
    private Collection $stays;

    #[ORM\OneToMany(mappedBy: 'resort', targetEntity: Activities::class)]
    private Collection $activities;

    public function __construct()
    {
        $this->stays = new ArrayCollection();
        $this->activities = new ArrayCollection();
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

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPlace(): ?string
    {
        return $this->place;
    }

    public function setPlace(string $place): static
    {
        $this->place = $place;

        return $this;
    }

    public function getArea(): ?string
    {
        return $this->area;
    }

    public function setArea(string $area): static
    {
        $this->area = $area;

        return $this;
    }

    public function getStartingPrice(): ?string
    {
        return $this->starting_price;
    }

    public function setStartingPrice(string $starting_price): static
    {
        $this->starting_price = $starting_price;

        return $this;
    }

    public function getOrderNumber(): ?int
    {
        return $this->order_number;
    }

    public function setOrderNumber(int $order_number): static
    {
        $this->order_number = $order_number;

        return $this;
    }

    public function getStars(): ?string
    {
        return $this->stars;
    }

    public function setStars(string $stars): static
    {
        $this->stars = $stars;

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

    /**
     * @return Collection<int, Stay>
     */
    public function getStays(): Collection
    {
        return $this->stays;
    }

    public function addStay(Stay $stay): self
    {
        if (!$this->stays->contains($stay)) {
            $this->stays->add($stay);
            $stay->setResort($this);
        }

        return $this;
    }

    public function removeStay(Stay $stay): self
    {
        if ($this->stays->removeElement($stay)) {
            // set the owning side to null (unless already changed)
            if ($stay->getResort() === $this) {
                $stay->setResort(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Activities>
     */
    public function getActivities(): Collection
    {
        return $this->activities;
    }

    public function addActivity(Activities $activity): static
    {
        if (!$this->activities->contains($activity)) {
            $this->activities->add($activity);
            $activity->setResort($this);
        }

        return $this;
    }

    public function removeActivity(Activities $activity): static
    {
        if ($this->activities->removeElement($activity)) {
            // set the owning side to null (unless already changed)
            if ($activity->getResort() === $this) {
                $activity->setResort(null);
            }
        }

        return $this;
    }
}
