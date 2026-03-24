<?php

namespace App\Entity;

use App\Repository\ArchiveEntrepriseRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Talleu\TriggerMapping\Attribute\Trigger;

#[ORM\Entity(repositoryClass: ArchiveEntrepriseRepository::class)]
#[Trigger(name: 'Tri_History_Entreprise', on: ['INSERT'], when: 'AFTER', scope: 'ROW', className: 'App\Triggers\TriHistoryEntreprise')]
class ArchiveEntreprise
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $idEntreprise = null;

    #[ORM\Column(length: 12)]
    private ?string $type = null;

    #[ORM\Column(length: 255)]
    private ?string $nomOld = null;

    #[ORM\Column(length: 255)]
    private ?string $nomNew = null;

    #[ORM\Column(length: 255)]
    private ?string $adresseOld = null;

    #[ORM\Column(length: 255)]
    private ?string $adresseNew = null;

    #[ORM\Column(length: 100)]
    private ?string $villeOld = null;

    #[ORM\Column(length: 100)]
    private ?string $villeNew = null;

    #[ORM\Column(length: 10)]
    private ?string $cpOld = null;

    #[ORM\Column(length: 10)]
    private ?string $cpNew = null;

    #[ORM\Column(length: 255)]
    private ?string $contactOld = null;

    #[ORM\Column(length: 255)]
    private ?string $contactNew = null;

    #[ORM\Column(length: 20)]
    private ?string $telOld = null;

    #[ORM\Column(length: 20)]
    private ?string $telNew = null;

    #[ORM\Column(length: 255)]
    private ?string $emailOld = null;

    #[ORM\Column(length: 255)]
    private ?string $emailNew = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTime $dateChangement = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdEntreprise(): ?int
    {
        return $this->idEntreprise;
    }

    public function setIdEntreprise(int $idEntreprise): static
    {
        $this->idEntreprise = $idEntreprise;

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

    public function getAdresseOld(): ?string
    {
        return $this->adresseOld;
    }

    public function setAdresseOld(string $adresseOld): static
    {
        $this->adresseOld = $adresseOld;

        return $this;
    }

    public function getAdresseNew(): ?string
    {
        return $this->adresseNew;
    }

    public function setAdresseNew(string $adresseNew): static
    {
        $this->adresseNew = $adresseNew;

        return $this;
    }

    public function getVilleOld(): ?string
    {
        return $this->villeOld;
    }

    public function setVilleOld(string $villeOld): static
    {
        $this->villeOld = $villeOld;

        return $this;
    }

    public function getVilleNew(): ?string
    {
        return $this->villeNew;
    }

    public function setVilleNew(string $villeNew): static
    {
        $this->villeNew = $villeNew;

        return $this;
    }

    public function getCpOld(): ?string
    {
        return $this->cpOld;
    }

    public function setCpOld(string $cpOld): static
    {
        $this->cpOld = $cpOld;

        return $this;
    }

    public function getCpNew(): ?string
    {
        return $this->cpNew;
    }

    public function setCpNew(string $cpNew): static
    {
        $this->cpNew = $cpNew;

        return $this;
    }

    public function getContactOld(): ?string
    {
        return $this->contactOld;
    }

    public function setContactOld(string $contactOld): static
    {
        $this->contactOld = $contactOld;

        return $this;
    }

    public function getContactNew(): ?string
    {
        return $this->contactNew;
    }

    public function setContactNew(string $contactNew): static
    {
        $this->contactNew = $contactNew;

        return $this;
    }

    public function getTelOld(): ?string
    {
        return $this->telOld;
    }

    public function setTelOld(string $telOld): static
    {
        $this->telOld = $telOld;

        return $this;
    }

    public function getTelNew(): ?string
    {
        return $this->telNew;
    }

    public function setTelNew(string $telNew): static
    {
        $this->telNew = $telNew;

        return $this;
    }

    public function getEmailOld(): ?string
    {
        return $this->emailOld;
    }

    public function setEmailOld(string $emailOld): static
    {
        $this->emailOld = $emailOld;

        return $this;
    }

    public function getEmailNew(): ?string
    {
        return $this->emailNew;
    }

    public function setEmailNew(string $emailNew): static
    {
        $this->emailNew = $emailNew;

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