<?php

namespace App\Entity;

use App\Repository\StageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Talleu\TriggerMapping\Attribute\Trigger;

#[ORM\Entity(repositoryClass: StageRepository::class)]
#[Trigger(name: 'Tri_Archive_Stage_Ajout', on: ['INSERT'], when: 'AFTER', scope: 'ROW', className: 'App\Triggers\TriArchiveStageAjout')]
#[Trigger(name: 'Tri_Archive_Stage_Modification', on: ['UPDATE'], when: 'AFTER', scope: 'ROW', className: 'App\Triggers\TriArchiveStageModification')]
#[Trigger(name: 'Tri_Archive_Stage_Suppression', on: ['DELETE'], when: 'AFTER', scope: 'ROW', className: 'App\Triggers\TriArchiveStageSuppression')]
class Stage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $dateDebut = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $dateFin = null;

    #[ORM\ManyToOne(inversedBy: 'stages')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Entreprise $entreprise = null;

    #[ORM\ManyToOne(inversedBy: 'stagesSuivi')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $profSuivi = null;

    #[ORM\ManyToOne(inversedBy: 'stagesVisite')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $profVisite = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Etudiant $etudiant = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebut(): ?\DateTime
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTime $dateDebut): static
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTime
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTime $dateFin): static
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getEntreprise(): ?Entreprise
    {
        return $this->entreprise;
    }

    public function setEntreprise(?Entreprise $entreprise): static
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    public function getProfSuivi(): ?Utilisateur
    {
        return $this->profSuivi;
    }

    public function setProfSuivi(?Utilisateur $profSuivi): static
    {
        $this->profSuivi = $profSuivi;

        return $this;
    }

    public function getProfVisite(): ?Utilisateur
    {
        return $this->profVisite;
    }

    public function setProfVisite(?Utilisateur $profVisite): static
    {
        $this->profVisite = $profVisite;

        return $this;
    }

    public function getEtudiant(): ?Etudiant
    {
        return $this->etudiant;
    }

    public function setEtudiant(?Etudiant $etudiant): static
    {
        $this->etudiant = $etudiant;

        return $this;
    }
}
