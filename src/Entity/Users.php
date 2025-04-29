<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_NAME', fields: ['name'])]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class Users implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180)]
    private ?string $name = null;

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $lastName = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\ManyToOne(inversedBy: 'user')]
    #[ORM\JoinColumn(name: 'career_id_id', referencedColumnName: 'id', nullable: false)]
    private ?Careers $career = null; // Cambié careerId a career para mayor claridad

    /**
     * @var Collection<int, UsersSubjects>
     */
    #[ORM\OneToMany(targetEntity: UsersSubjects::class, mappedBy: 'userId', orphanRemoval: true)]
    private Collection $userSubjects; // Cambié a plural

    /**
     * @var Collection<int, UsersSchedules>
     */
    #[ORM\OneToMany(targetEntity: UsersSchedules::class, mappedBy: 'userId', orphanRemoval: true)]
    private Collection $userSchedules;

    #[ORM\Column]
    private bool $isVerified = false; // Cambié a plural

    public function __construct()
    {
        $this->userSubjects = new ArrayCollection();
        $this->userSchedules = new ArrayCollection();
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email; // Cambié a email, puedes cambiar a $this->name si prefieres
    }

    /**
     * @see UserInterface
     *
     * @return list<string>
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;
        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;
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

    public function getCareer(): ?Careers
    {
        return $this->career;
    }

    public function setCareer(?Careers $career): static
    {
        $this->career = $career;
        return $this;
    }

    /**
     * @return Collection<int, UsersSubjects>
     */
    public function getUserSubjects(): Collection
    {
        return $this->userSubjects;
    }

    public function addUserSubject(UsersSubjects $userSubject): static
    {
        if (!$this->userSubjects->contains($userSubject)) {
            $this->userSubjects->add($userSubject);
            $userSubject->setUserId($this);
        }

        return $this;
    }

    public function removeUserSubject(UsersSubjects $userSubject): static
    {
        if ($this->userSubjects->removeElement($userSubject)) {
            // set the owning side to null (unless already changed)
            if ($userSubject->getUserId() === $this) {
                $userSubject->setUserId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, UsersSchedules>
     */
    public function getUserSchedules(): Collection
    {
        return $this->userSchedules;
    }

    public function addUserSchedule(UsersSchedules $userSchedule): static
    {
        if (!$this->userSchedules->contains($userSchedule)) {
            $this->userSchedules->add($userSchedule);
            $userSchedule->setUserId($this);
        }

        return $this;
    }

    public function removeUserSchedule(UsersSchedules $userSchedule): static
    {
        if ($this->userSchedules->removeElement($userSchedule)) {
            // set the owning side to null (unless already changed)
            if ($userSchedule->getUserId() === $this) {
                $userSchedule->setUserId(null);
            }
        }

        return $this;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setVerified(bool $isVerified): static
    {
        $this->isVerified = $isVerified;

        return $this;
    }
}
