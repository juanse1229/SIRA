<?php

namespace App\Entity;

use App\Repository\SubjectsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SubjectsRepository::class)]
class Subjects
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $credits = null;

    #[ORM\Column]
    private ?int $semester = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\ManyToOne(targetEntity: Careers::class, inversedBy: 'subjects')]
    #[ORM\JoinColumn(name: "career_id", referencedColumnName: "id", nullable: false)]
    
    private ?Careers $careerId = null;
    /**
     * @var Collection<int, UsersSubjects>
     */
    #[ORM\OneToMany(targetEntity: UsersSubjects::class, mappedBy: 'subjectId', orphanRemoval: true)]
    private Collection $userSubject;

    /**
     * @var Collection<int, Schedules>
     */
    #[ORM\OneToMany(targetEntity: Schedules::class, mappedBy: 'subjectId')]
    private Collection $schedule;

    #[ORM\OneToOne(targetEntity: self::class, cascade: ['persist', 'remove'])]
    private ?self $prerequisites = null;

    public function __construct()
    {
        $this->userSubject = new ArrayCollection();
        $this->schedule = new ArrayCollection();
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

    public function getCredits(): ?int
    {
        return $this->credits;
    }

    public function setCredits(int $credits): static
    {
        $this->credits = $credits;

        return $this;
    }

    public function getSemester(): ?int
    {
        return $this->semester;
    }

    public function setSemester(int $semester): static
    {
        $this->semester = $semester;

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

    public function getCareerId(): ?Careers
    {
        return $this->careerId;
    }

    public function setCareerId(?Careers $careerId): static
    {
        $this->careerId = $careerId;

        return $this;
    }

    /**
     * @return Collection<int, UsersSubjects>
     */
    public function getUserSubject(): Collection
    {
        return $this->userSubject;
    }

    public function addUserSubject(UsersSubjects $userSubject): static
    {
        if (!$this->userSubject->contains($userSubject)) {
            $this->userSubject->add($userSubject);
            $userSubject->setSubjectId($this);
        }

        return $this;
    }

    public function removeUserSubject(UsersSubjects $userSubject): static
    {
        if ($this->userSubject->removeElement($userSubject)) {
            // set the owning side to null (unless already changed)
            if ($userSubject->getSubjectId() === $this) {
                $userSubject->setSubjectId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Schedules>
     */
    public function getSchedule(): Collection
    {
        return $this->schedule;
    }

    public function addSchedule(Schedules $schedule): static
    {
        if (!$this->schedule->contains($schedule)) {
            $this->schedule->add($schedule);
            $schedule->setSubjectId($this);
        }

        return $this;
    }

    public function removeSchedule(Schedules $schedule): static
    {
        if ($this->schedule->removeElement($schedule)) {
            // set the owning side to null (unless already changed)
            if ($schedule->getSubjectId() === $this) {
                $schedule->setSubjectId(null);
            }
        }

        return $this;
    }

    public function getPrerequisites(): ?self
    {
        return $this->prerequisites;
    }

    public function setPrerequisites(?self $prerequisites): static
    {
        $this->prerequisites = $prerequisites;

        return $this;
    }
}
