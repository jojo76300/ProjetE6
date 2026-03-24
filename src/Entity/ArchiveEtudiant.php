<?php

namespace App\Entity;

use App\Repository\ArchiveEtudiantRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Talleu\TriggerMapping\Attribute\Trigger;

#[ORM\Entity(repositoryClass: ArchiveEtudiantRepository::class)]
#[Trigger(name: 'Tri_History_Etudiant', on: ['INSERT'], when: 'AFTER', scope: 'ROW', className: 'App\Triggers\TriHistoryEtudiant')]
class ArchiveEtudiant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $idEtudiant = null;

    #[ORM\Column(length: 12)]
    private ?string $type = null;

    #[ORM\Column(length: 38)]
    private ?string $nomOld = null;

    #[ORM\Column(length: 38)]
    private ?string $nomNew = null;

    #[ORM\Column(length: 38)]
    private ?string $prenomOld = null;

    #[ORM\Column(length: 38)]
    private ?string $prenomNew = null;

    #[ORM\Column(length: 100)]
    private ?string $filiereOld = null;

    #[ORM\Column(length: 100)]
    private ?string $filiereNew = null;

    #[ORM\Column(length: 30)]
    private ?string $annPromotionOld = null;

    #[ORM\Column(length: 30)]
    private ?string $annPromotionNew = null;

    #[ORM\Column(type: Types::BOOLEAN)]
    private ?bool $isArchivedOld = null;

    #[ORM\Column(type: Types::BOOLEAN)]
    private ?bool $isArchivedNew = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTime $dateChangement = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdEtudiant(): ?int
    {
        return $this->idEtudiant;
    }

    public function setIdEtudiant(int $idEtudiant): static
    {
        $this->idEtudiant = $idEtudiant;

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

    public function getNomOld(): ?string
    {
        return $this->nomOld;
    }

    public function setNomOld(string $nomOld): static
    {
        $this->nomOld = $nomOld;

        return $this;
    }

    public function getNomNew(): ?string
    {
        return $this->nomNew;
    }

    public function setNomNew(string $nomNew): static
    {
        $this->nomNew = $nomNew;

        return $this;
    }

    public function getPrenomOld(): ?string
    {
        return $this->prenomOld;
    }

    public function setPrenomOld(string $prenomOld): static
    {
        $this->prenomOld = $prenomOld;

        return $this;
    }

    public function getPrenomNew(): ?string
    {
        return $this->prenomNew;
    }

    public function setPrenomNew(string $prenomNew): static
    {
        $this->prenomNew = $prenomNew;

        return $this;
    }

    public function getFiliereOld(): ?string
    {
        return $this->filiereOld;
    }

    public function setFiliereOld(string $filiereOld): static
    {
        $this->filiereOld = $filiereOld;

        return $this;
    }

    public function getFiliereNew(): ?string
    {
        return $this->filiereNew;
    }

    public function setFiliereNew(string $filiereNew): static
    {
        $this->filiereNew = $filiereNew;

        return $this;
    }

    public function getAnnPromotionOld(): ?string
    {
        return $this->annPromotionOld;
    }

    public function setAnnPromotionOld(string $annPromotionOld): static
    {
        $this->annPromotionOld = $annPromotionOld;

        return $this;
    }

    public function getAnnPromotionNew(): ?string
    {
        return $this->annPromotionNew;
    }

    public function setAnnPromotionNew(string $annPromotionNew): static
    {
        $this->annPromotionNew = $annPromotionNew;

        return $this;
    }

    public function isArchivedOld(): ?bool
    {
        return $this->isArchivedOld;
    }

    public function setIsArchivedOld(bool $isArchivedOld): static
    {
        $this->isArchivedOld = $isArchivedOld;

        return $this;
    }

    public function isArchivedNew(): ?bool
    {
        return $this->isArchivedNew;
    }

    public function setIsArchivedNew(bool $isArchivedNew): static
    {
        $this->isArchivedNew = $isArchivedNew;

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