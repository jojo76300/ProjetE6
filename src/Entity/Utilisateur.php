<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]

class Utilisateur implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)] // J'ai ajouté unique: true, c'est fortement recommandé pour les emails de connexion
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $mdp = null;

    #[ORM\Column]
    private ?bool $status = null;

    /**
     * @var Collection<int, Avoir>
     */
    #[ORM\OneToMany(targetEntity: Avoir::class, mappedBy: 'utilisateur')]
    private Collection $avoirs;

    /**
     * @var Collection<int, Stage>
     */
    #[ORM\OneToMany(targetEntity: Stage::class, mappedBy: 'profSuivi')]
    private Collection $stagesSuivi;

    /**
     * @var Collection<int, Stage>
     */
    #[ORM\OneToMany(targetEntity: Stage::class, mappedBy: 'profVisite')]
    private Collection $stagesVisite;

    public function __construct()
    {
        $this->avoirs = new ArrayCollection();
        $this->stagesSuivi = new ArrayCollection();
        $this->stagesVisite = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): static
    {
        $this->mdp = $mdp;

        return $this;
    }

    public function isStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): static
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection<int, Avoir>
     */
    public function getAvoirs(): Collection
    {
        return $this->avoirs;
    }

    public function addAvoir(Avoir $avoir): static
    {
        if (!$this->avoirs->contains($avoir)) {
            $this->avoirs->add($avoir);
            $avoir->setUtilisateur($this);
        }

        return $this;
    }

    public function removeAvoir(Avoir $avoir): static
    {
        $this->avoirs->removeElement($avoir);

        return $this;
    }

    /**
     * Un identifiant visuel qui représente cet utilisateur.
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        // Par défaut, tous les utilisateurs ont le rôle ROLE_USER
        
        return ['ROLE_USER'];
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        
        return $this->mdp;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // Utile uniquement si on stocke temporairement un mot de passe en clair
    }

    /**
     * @return Collection<int, Stage>
     */
    public function getStagesSuivi(): Collection
    {
        return $this->stagesSuivi;
    }

    public function addStageSuivi(Stage $stage): static
    {
        if (!$this->stagesSuivi->contains($stage)) {
            $this->stagesSuivi->add($stage);
            $stage->setProfSuivi($this);
        }

        return $this;
    }

    public function removeStageSuivi(Stage $stage): static
    {
        $this->stagesSuivi->removeElement($stage);

        return $this;
    }

    /**
     * @return Collection<int, Stage>
     */
    public function getStagesVisite(): Collection
    {
        return $this->stagesVisite;
    }

    public function addStageVisite(Stage $stage): static
    {
        if (!$this->stagesVisite->contains($stage)) {
            $this->stagesVisite->add($stage);
            $stage->setProfVisite($this);
        }

        return $this;
    }

    public function removeStageVisite(Stage $stage): static
    {
        $this->stagesVisite->removeElement($stage);

        return $this;
    }
}
