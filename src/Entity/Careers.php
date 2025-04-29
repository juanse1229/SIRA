<?php

namespace App\Entity;

use App\Repository\CareersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CareersRepository::class)]
class Careers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $careerName = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    /**
     * @var Collection<int, Users>
     */
    #[ORM\OneToMany(targetEntity: Users::class, mappedBy: 'careerId')]
    private Collection $user;

    /**
     * @var Collection<int, Subjects>
     */
    #[ORM\OneToMany(targetEntity: Subjects::class, mappedBy: 'careerId', orphanRemoval: true)]
    private Collection $subject;

    public function __construct()
    {
        $this->user = new ArrayCollection();
        $this->subject = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCareerName(): ?string
    {
        return $this->careerName;
    }

    public function setCareerName(string $careerName): static
    {
        $this->careerName = $careerName;

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
     * @return Collection<int, Users>
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(Users $user): static
    {
        if (!$this->user->contains($user)) {
            $this->user->add($user);
            $user->setCareerId($this);
        }

        return $this;
    }

    public function removeUser(Users $user): static
    {
        if ($this->user->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getCareerId() === $this) {
                $user->setCareerId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Subjects>
     */
    public function getSubject(): Collection
    {
        return $this->subject;
    }

    public function addSubject(Subjects $subject): static
    {
        if (!$this->subject->contains($subject)) {
            $this->subject->add($subject);
            $subject->setCareerId($this);
        }

        return $this;
    }

    public function removeSubject(Subjects $subject): static
    {
        if ($this->subject->removeElement($subject)) {
            // set the owning side to null (unless already changed)
            if ($subject->getCareerId() === $this) {
                $subject->setCareerId(null);
            }
        }

        return $this;
    }
}
