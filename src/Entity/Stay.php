<?php

namespace App\Entity;

use App\Repository\StayRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StayRepository::class)]
class Stay
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $duration_weeks = null;

    #[ORM\Column]
    private ?int $number_of_travelers = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $check_in = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $check_out = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_time = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $total_amount = null;


    #[ORM\ManyToOne(inversedBy: 'stays')]
    #[ORM\JoinColumn(nullable: false)]
    /**
     * @ORM\ManyToOne(targetEntity="Resort", inversedBy="stays", cascade={"persist"})
     * @ORM\JoinColumn(name="resort_id", referencedColumnName="id", nullable=false)
     */
    private ?Resort $resort = null;


    #[ORM\ManyToOne(inversedBy: 'stays')]
    #[ORM\JoinColumn(nullable: false)]
    /**
     * @ORM\ManyToOne(targetEntity="ExtraActivities", inversedBy="stays", cascade={"persist"})
     * @ORM\JoinColumn(name="extra_activities_id", referencedColumnName="id", nullable=false)
     */
    private ?ExtraActivities $extra_activities = null;


    #[ORM\ManyToOne(inversedBy: 'stays')]
    #[ORM\JoinColumn(nullable: false)]
    /**
     * @ORM\ManyToOne(targetEntity="Accommodation", inversedBy="stays", cascade={"persist"})
     * @ORM\JoinColumn(name="accommodation_id", referencedColumnName="id", nullable=false)
     */
    private ?Accommodation $accommodation = null;


    #[ORM\ManyToOne(inversedBy: 'stays')]
    #[ORM\JoinColumn(nullable: false)]
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="stays", cascade={"persist"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    private ?User $user = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDurationWeeks(): ?int
    {
        return $this->duration_weeks;
    }

    public function setDurationWeeks(int $duration_weeks): static
    {
        $this->duration_weeks = $duration_weeks;

        return $this;
    }

    public function getNumberOfTravelers(): ?int
    {
        return $this->number_of_travelers;
    }

    public function setNumberOfTravelers(int $number_of_travelers): static
    {
        $this->number_of_travelers = $number_of_travelers;

        return $this;
    }

    public function getCheckIn(): ?\DateTimeInterface
    {
        return $this->check_in;
    }

    public function setCheckIn(\DateTimeInterface $check_in): static
    {
        $this->check_in = $check_in;

        return $this;
    }

    public function getCheckOut(): ?\DateTimeInterface
    {
        return $this->check_out;
    }

    public function setCheckOut(\DateTimeInterface $check_out): static
    {
        $this->check_out = $check_out;

        return $this;
    }

    public function getDateTime(): ?\DateTimeInterface
    {
        return $this->date_time;
    }

    public function setDateTime(\DateTimeInterface $date_time): static
    {
        $this->date_time = $date_time;

        return $this;
    }

    public function getTotalAmount(): ?string
    {
        return $this->total_amount;
    }

    public function setTotalAmount(string $total_amount): static
    {
        $this->total_amount = $total_amount;

        return $this;
    }


    public function getResort(): ?Resort
    {
        return $this->resort;
    }

    public function setResort(?Resort $resort): static
    {
        $this->resort = $resort;

        return $this;
    }


    public function getExtraActivities(): ?ExtraActivities
    {
        return $this->extra_activities;
    }

    public function setExtraActivities(?ExtraActivities $extra_activities): static
    {
        $this->extra_activities = $extra_activities;

        return $this;
    }

    public function getAccommodation(): ?Accommodation
    {
        return $this->accommodation;
    }

    public function setAccommodation(?Accommodation $accommodation): static
    {
        $this->accommodation = $accommodation;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }
}
