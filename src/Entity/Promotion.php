<?php

namespace App\Entity;

use App\Repository\PromotionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PromotionRepository::class)]
class Promotion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $classe = null;

    #[ORM\Column(length: 9)]
    private ?string $session = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $dateDebutStage = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $dateFinStage = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClasse(): ?string
    {
        return $this->classe;
    }

    public function setClasse(string $classe): static
    {
        $this->classe = $classe;

        return $this;
    }

    public function getSession(): ?string
    {
        return $this->session;
    }

    public function setSession(string $session): static
    {
        $this->session = $session;

        return $this;
    }

    public function getDateDebutStage(): ?\DateTime
    {
        return $this->dateDebutStage;
    }

    public function setDateDebutStage(\DateTime $dateDebutStage): static
    {
        $this->dateDebutStage = $dateDebutStage;

        return $this;
    }

    public function getDateFinStage(): ?\DateTime
    {
        return $this->dateFinStage;
    }

    public function setDateFinStage(\DateTime $dateFinStage): static
    {
        $this->dateFinStage = $dateFinStage;

        return $this;
    }
}
