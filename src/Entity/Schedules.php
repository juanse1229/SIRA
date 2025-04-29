<?php

namespace App\Entity;

use App\Repository\SchedulesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SchedulesRepository::class)]
class Schedules
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $groupNumber = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $startTime = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $endTime = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    /**
     * @var Collection<int, UsersSchedules>
     */
    #[ORM\OneToMany(targetEntity: UsersSchedules::class, mappedBy: 'scheduleId', orphanRemoval: true)]
    private Collection $userSchedule;

    #[ORM\ManyToOne(inversedBy: 'schedule')]
    private ?Subjects $subject_id = null;

    #[ORM\Column(length: 255)]
    private ?string $day = null;

    public function __construct()
    {
        $this->userSchedule = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGroupNumber(): ?int
    {
        return $this->groupNumber;
    }

    public function setGroupNumber(int $groupNumber): static
    {
        $this->groupNumber = $groupNumber;

        return $this;
    }

    public function getStartTime(): ?\DateTimeInterface
    {
        return $this->startTime;
    }

    public function setStartTime(\DateTimeInterface $startTime): static
    {
        $this->startTime = $startTime;

        return $this;
    }

    public function getEndTime(): ?\DateTimeInterface
    {
        return $this->endTime;
    }

    public function setEndTime(\DateTimeInterface $endTime): static
    {
        $this->endTime = $endTime;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection<int, UsersSchedules>
     */
    public function getUserSchedule(): Collection
    {
        return $this->userSchedule;
    }

    public function addUserSchedule(UsersSchedules $userSchedule): static
    {
        if (!$this->userSchedule->contains($userSchedule)) {
            $this->userSchedule->add($userSchedule);
            $userSchedule->setScheduleId($this);
        }

        return $this;
    }

    public function removeUserSchedule(UsersSchedules $userSchedule): static
    {
        if ($this->userSchedule->removeElement($userSchedule)) {
            // set the owning side to null (unless already changed)
            if ($userSchedule->getScheduleId() === $this) {
                $userSchedule->setScheduleId(null);
            }
        }

        return $this;
    }

    public function getSubjectId(): ?Subjects
    {
        return $this->subject_id;
    }

    public function setSubjectId(?Subjects $subject_id): static
    {
        $this->subject_id = $subject_id;

        return $this;
    }

    public function getDay(): ?string
    {
        return $this->day;
    }

    public function setDay(string $day): static
    {
        $this->day = $day;

        return $this;
    }
}
