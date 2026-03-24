<?php

namespace App\Entity;

use App\Repository\EtudiantRepository;
use Doctrine\ORM\Mapping as ORM;
use Talleu\TriggerMapping\Attribute\Trigger;

#[ORM\Entity(repositoryClass: EtudiantRepository::class)]
#[Trigger(name: 'Tri_Archive_Etudiant_Modification', on: ['UPDATE'], when: 'AFTER', scope: 'ROW', className: 'App\Triggers\TriArchiveEtudiantModification')]
#[Trigger(name: 'Tri_Archive_Etudiant_Suppression', on: ['DELETE'], when: 'AFTER', scope: 'ROW', className: 'App\Triggers\TriArchiveEtudiantSuppression')]
#[Trigger(name: 'Tri_Archive_Etudiant_Ajout', on: ['INSERT'], when: 'AFTER', scope: 'ROW', className: 'App\Triggers\TriArchiveEtudiantAjout')]
class Etudiant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 38)]
    private ?string $nom = null;

    #[ORM\Column(length: 38)]
    private ?string $prenom = null;

    #[ORM\Column(length: 100)]
    private ?string $filiere = null;

    #[ORM\Column(length: 30)]
    private ?string $annPromotion = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getFiliere(): ?string
    {
        return $this->filiere;
    }

    public function setFiliere(string $filiere): static
    {
        $this->filiere = $filiere;

        return $this;
    }

    public function getAnnPromotion(): ?string
    {
        return $this->annPromotion;
    }

    public function setAnnPromotion(string $annPromotion): static
    {
        $this->annPromotion = $annPromotion;

        return $this;
    }
}
