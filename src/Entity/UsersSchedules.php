<?php

namespace App\Entity;

use App\Repository\UsersSchedulesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsersSchedulesRepository::class)]
class UsersSchedules
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\ManyToOne(inversedBy: 'userSchedule')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $userId = null;

    #[ORM\ManyToOne(inversedBy: 'userSchedule')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Schedules $scheduleId = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getUserId(): ?Users
    {
        return $this->userId;
    }

    public function setUserId(?Users $userId): static
    {
        $this->userId = $userId;

        return $this;
    }

    public function getScheduleId(): ?Schedules
    {
        return $this->scheduleId;
    }

    public function setScheduleId(?Schedules $scheduleId): static
    {
        $this->scheduleId = $scheduleId;

        return $this;
    }
}
