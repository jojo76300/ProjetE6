<?php

namespace App\Entity;

use App\Repository\HistoryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HistoryRepository::class)]
class History
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: ArchiveEtudiant::class)]
    #[ORM\JoinColumn(nullable: true)]
    private ?ArchiveEtudiant $archiveEtudiant = null;

    #[ORM\Column]
    private ?int $idArchiveEntreprise = null;

    #[ORM\Column]
    private ?int $idArchiveStage = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArchiveEtudiant(): ?ArchiveEtudiant
    {
        return $this->archiveEtudiant;
    }

    public function setArchiveEtudiant(?ArchiveEtudiant $archiveEtudiant): static
    {
        $this->archiveEtudiant = $archiveEtudiant;

        return $this;
    }

    public function getIdArchiveEntreprise(): ?int
    {
        return $this->idArchiveEntreprise;
    }

    public function setIdArchiveEntreprise(int $idArchiveEntreprise): static
    {
        $this->idArchiveEntreprise = $idArchiveEntreprise;

        return $this;
    }

    public function getIdArchiveStage(): ?int
    {
        return $this->idArchiveStage;
    }

    public function setIdArchiveStage(int $idArchiveStage): static
    {
        $this->idArchiveStage = $idArchiveStage;

        return $this;
    }
}