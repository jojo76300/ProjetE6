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
    #[ORM\JoinColumn(name: 'idarchiveetudiant', referencedColumnName: 'id', nullable: true)]
    private ?ArchiveEtudiant $archiveEtudiant = null;

    #[ORM\ManyToOne(targetEntity: ArchiveEntreprise::class)]
    #[ORM\JoinColumn(name: 'idarchiveentreprise', referencedColumnName: 'id', nullable: true)]
    private ?ArchiveEntreprise $archiveEntreprise = null;

    #[ORM\ManyToOne(targetEntity: ArchiveStage::class)]
    #[ORM\JoinColumn(name: 'idarchivestage', referencedColumnName: 'id', nullable: true)]
    private ?ArchiveStage $archiveStage = null;

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

    public function getArchiveEntreprise(): ?ArchiveEntreprise
    {
        return $this->archiveEntreprise;
    }

    public function setArchiveEntreprise(?ArchiveEntreprise $archiveEntreprise): static
    {
        $this->archiveEntreprise = $archiveEntreprise;

        return $this;
    }

    public function getArchiveStage(): ?ArchiveStage
    {
        return $this->archiveStage;
    }

    public function setArchiveStage(?ArchiveStage $archiveStage): static
    {
        $this->archiveStage = $archiveStage;

        return $this;
    }
}