<?php

namespace App\Entity;

use App\Repository\ArchiveStageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Talleu\TriggerMapping\Attribute\Trigger;

#[ORM\Entity(repositoryClass: ArchiveStageRepository::class)]
#[Trigger(name: 'Tri_History_Stage', on: ['INSERT'], when: 'AFTER', scope: 'ROW', className: 'App\Triggers\TriHistoryStage')]
class ArchiveStage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $idStage = null;

    #[ORM\Column(length: 12)]
    private ?string $type = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $dateDebutOld = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $dateDebutNew = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $dateFinOld = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $dateFinNew = null;

    #[ORM\Column]
    private ?int $entrepriseIdOld = null;

    #[ORM\Column]
    private ?int $entrepriseIdNew = null;

    #[ORM\Column]
    private ?int $profSuiviIdOld = null;

    #[ORM\Column]
    private ?int $profSuiviIdNew = null;

    #[ORM\Column]
    private ?int $profVisiteIdOld = null;

    #[ORM\Column]
    private ?int $profVisiteIdNew = null;

    #[ORM\Column]
    private ?int $etudiantIdOld = null;

    #[ORM\Column]
    private ?int $etudiantIdNew = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTime $dateChangement = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdStage(): ?int
    {
        return $this->idStage;
    }

    public function setIdStage(int $idStage): static
    {
        $this->idStage = $idStage;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getDateDebutOld(): ?\DateTime
    {
        return $this->dateDebutOld;
    }

    public function setDateDebutOld(\DateTime $dateDebutOld): static
    {
        $this->dateDebutOld = $dateDebutOld;

        return $this;
    }

    public function getDateDebutNew(): ?\DateTime
    {
        return $this->dateDebutNew;
    }

    public function setDateDebutNew(\DateTime $dateDebutNew): static
    {
        $this->dateDebutNew = $dateDebutNew;

        return $this;
    }

    public function getDateFinOld(): ?\DateTime
    {
        return $this->dateFinOld;
    }

    public function setDateFinOld(\DateTime $dateFinOld): static
    {
        $this->dateFinOld = $dateFinOld;

        return $this;
    }

    public function getDateFinNew(): ?\DateTime
    {
        return $this->dateFinNew;
    }

    public function setDateFinNew(\DateTime $dateFinNew): static
    {
        $this->dateFinNew = $dateFinNew;

        return $this;
    }

    public function getEntrepriseIdOld(): ?int
    {
        return $this->entrepriseIdOld;
    }

    public function setEntrepriseIdOld(int $entrepriseIdOld): static
    {
        $this->entrepriseIdOld = $entrepriseIdOld;

        return $this;
    }

    public function getEntrepriseIdNew(): ?int
    {
        return $this->entrepriseIdNew;
    }

    public function setEntrepriseIdNew(int $entrepriseIdNew): static
    {
        $this->entrepriseIdNew = $entrepriseIdNew;

        return $this;
    }

    public function getProfSuiviIdOld(): ?int
    {
        return $this->profSuiviIdOld;
    }

    public function setProfSuiviIdOld(int $profSuiviIdOld): static
    {
        $this->profSuiviIdOld = $profSuiviIdOld;

        return $this;
    }

    public function getProfSuiviIdNew(): ?int
    {
        return $this->profSuiviIdNew;
    }

    public function setProfSuiviIdNew(int $profSuiviIdNew): static
    {
        $this->profSuiviIdNew = $profSuiviIdNew;

        return $this;
    }

    public function getProfVisiteIdOld(): ?int
    {
        return $this->profVisiteIdOld;
    }

    public function setProfVisiteIdOld(int $profVisiteIdOld): static
    {
        $this->profVisiteIdOld = $profVisiteIdOld;

        return $this;
    }

    public function getProfVisiteIdNew(): ?int
    {
        return $this->profVisiteIdNew;
    }

    public function setProfVisiteIdNew(int $profVisiteIdNew): static
    {
        $this->profVisiteIdNew = $profVisiteIdNew;

        return $this;
    }

    public function getEtudiantIdOld(): ?int
    {
        return $this->etudiantIdOld;
    }

    public function setEtudiantIdOld(int $etudiantIdOld): static
    {
        $this->etudiantIdOld = $etudiantIdOld;

        return $this;
    }

    public function getEtudiantIdNew(): ?int
    {
        return $this->etudiantIdNew;
    }

    public function setEtudiantIdNew(int $etudiantIdNew): static
    {
        $this->etudiantIdNew = $etudiantIdNew;

        return $this;
    }

    public function getDateChangement(): ?\DateTime
    {
        return $this->dateChangement;
    }

    public function setDateChangement(\DateTime $dateChangement): static
    {
        $this->dateChangement = $dateChangement;

        return $this;
    }
}