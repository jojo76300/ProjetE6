<?php

namespace App\DataFixtures;

use App\Entity\Avoir;
use App\Entity\Entreprise;
use App\Entity\Etudiant;
use App\Entity\Role;
use App\Entity\Stage;
use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $passwordHasher)
    {
    }

    public function load(ObjectManager $manager): void
    {
        // ============ RÔLES ============
        $roleAdmin = new Role();
        $roleAdmin->setLibelle('Administrateur');
        $roleAdmin->setDescription('Accès complet à l\'application');
        $manager->persist($roleAdmin);

        $roleProf = new Role();
        $roleProf->setLibelle('Professeur');
        $roleProf->setDescription('Peut suivre et visiter les stages des étudiants');
        $manager->persist($roleProf);

        $roleEtudiant = new Role();
        $roleEtudiant->setLibelle('Étudiant');
        $roleEtudiant->setDescription('Peut consulter ses stages');
        $manager->persist($roleEtudiant);

        // ============ UTILISATEURS ============
        // Administrateur
        $admin = new Utilisateur();
        $admin->setEmail('admin@school.fr');
        $admin->setMdp($this->passwordHasher->hashPassword($admin, 'admin123'));
        $admin->setStatus(true);
        $manager->persist($admin);

        $avoirAdmin = new Avoir();
        $avoirAdmin->setUtilisateur($admin);
        $avoirAdmin->setRole($roleAdmin);
        $manager->persist($avoirAdmin);

        // Professeurs
        $prof1 = new Utilisateur();
        $prof1->setEmail('dupont.jean@school.fr');
        $prof1->setMdp($this->passwordHasher->hashPassword($prof1, 'prof123'));
        $prof1->setStatus(true);
        $manager->persist($prof1);

        $avoirProf1 = new Avoir();
        $avoirProf1->setUtilisateur($prof1);
        $avoirProf1->setRole($roleProf);
        $manager->persist($avoirProf1);

        $prof2 = new Utilisateur();
        $prof2->setEmail('martin.sophie@school.fr');
        $prof2->setMdp($this->passwordHasher->hashPassword($prof2, 'prof123'));
        $prof2->setStatus(true);
        $manager->persist($prof2);

        $avoirProf2 = new Avoir();
        $avoirProf2->setUtilisateur($prof2);
        $avoirProf2->setRole($roleProf);
        $manager->persist($avoirProf2);

        $prof3 = new Utilisateur();
        $prof3->setEmail('bernard.michel@school.fr');
        $prof3->setMdp($this->passwordHasher->hashPassword($prof3, 'prof123'));
        $prof3->setStatus(true);
        $manager->persist($prof3);

        $avoirProf3 = new Avoir();
        $avoirProf3->setUtilisateur($prof3);
        $avoirProf3->setRole($roleProf);
        $manager->persist($avoirProf3);

        // ============ ÉTUDIANTS ============
        $etudiant1 = new Etudiant();
        $etudiant1->setNom('Leblanc');
        $etudiant1->setPrenom('Alice');
        $etudiant1->setFiliere('SLAM');
        $etudiant1->setAnnPromotion('2024-2025');
        $manager->persist($etudiant1);

        $etudiant2 = new Etudiant();
        $etudiant2->setNom('Moreau');
        $etudiant2->setPrenom('Baptiste');
        $etudiant2->setFiliere('SISR');
        $etudiant2->setAnnPromotion('2024-2025');
        $manager->persist($etudiant2);

        $etudiant3 = new Etudiant();
        $etudiant3->setNom('Girard');
        $etudiant3->setPrenom('Célia');
        $etudiant3->setFiliere('SISR');
        $etudiant3->setAnnPromotion('2024-2025');
        $manager->persist($etudiant3);

        $etudiant4 = new Etudiant();
        $etudiant4->setNom('Fontaine');
        $etudiant4->setPrenom('David');
        $etudiant4->setFiliere('SLAM');
        $etudiant4->setAnnPromotion('2024-2025');
        $manager->persist($etudiant4);

        $etudiant5 = new Etudiant();
        $etudiant5->setNom('Rousseau');
        $etudiant5->setPrenom('Emma');
        $etudiant5->setFiliere('SLAM');
        $etudiant5->setAnnPromotion('2025-2026');
        $manager->persist($etudiant5);

        // ============ ENTREPRISES ============
        $entreprise1 = new Entreprise();
        $entreprise1->setNom('TechSolutions SARL');
        $entreprise1->setAdresse('42, rue de la Innovation');
        $entreprise1->setVille('Lyon');
        $entreprise1->setCp('69000');
        $entreprise1->setContact('Pierre Durand');
        $entreprise1->setTel('04 72 XX XX XX');
        $entreprise1->setEmail('contact@techsolutions.fr');
        $manager->persist($entreprise1);

        $entreprise2 = new Entreprise();
        $entreprise2->setNom('Digital Consulting');
        $entreprise2->setAdresse('15, avenue des Champs');
        $entreprise2->setVille('Paris');
        $entreprise2->setCp('75008');
        $entreprise2->setContact('Marie Laurent');
        $entreprise2->setTel('01 XX XX XX XX');
        $entreprise2->setEmail('rh@digitalconsulting.fr');
        $manager->persist($entreprise2);

        $entreprise3 = new Entreprise();
        $entreprise3->setNom('MecaTech Industries');
        $entreprise3->setAdresse('Parc industriel de Blavozy');
        $entreprise3->setVille('Saint-Étienne');
        $entreprise3->setCp('42000');
        $entreprise3->setContact('Jean Rivière');
        $entreprise3->setTel('04 77 XX XX XX');
        $entreprise3->setEmail('recrutement@mecarech.fr');
        $manager->persist($entreprise3);

        $entreprise4 = new Entreprise();
        $entreprise4->setNom('ElectroMaster SAS');
        $entreprise4->setAdresse('Zone commerciale de Villeurbanne');
        $entreprise4->setVille('Villeurbanne');
        $entreprise4->setCp('69100');
        $entreprise4->setContact('Sophie Bernard');
        $entreprise4->setTel('04 37 XX XX XX');
        $entreprise4->setEmail('contact@electromaster.fr');
        $manager->persist($entreprise4);

        // ============ STAGES ============
        $stage1 = new Stage();
        $stage1->setDateDebut(new \DateTime('2024-09-01'));
        $stage1->setDateFin(new \DateTime('2024-12-15'));
        $stage1->setEntreprise($entreprise1);
        $stage1->setProfSuivi($prof1);
        $stage1->setProfVisite($prof2);
        $stage1->setEtudiant($etudiant1);
        $manager->persist($stage1);

        $stage2 = new Stage();
        $stage2->setDateDebut(new \DateTime('2024-10-15'));
        $stage2->setDateFin(new \DateTime('2025-01-30'));
        $stage2->setEntreprise($entreprise2);
        $stage2->setProfSuivi($prof1);
        $stage2->setProfVisite($prof3);
        $stage2->setEtudiant($etudiant2);
        $manager->persist($stage2);

        $stage3 = new Stage();
        $stage3->setDateDebut(new \DateTime('2025-02-01'));
        $stage3->setDateFin(new \DateTime('2025-05-31'));
        $stage3->setEntreprise($entreprise3);
        $stage3->setProfSuivi($prof2);
        $stage3->setProfVisite($prof1);
        $stage3->setEtudiant($etudiant3);
        $manager->persist($stage3);

        $stage4 = new Stage();
        $stage4->setDateDebut(new \DateTime('2024-09-15'));
        $stage4->setDateFin(new \DateTime('2024-12-20'));
        $stage4->setEntreprise($entreprise4);
        $stage4->setProfSuivi($prof3);
        $stage4->setProfVisite($prof2);
        $stage4->setEtudiant($etudiant4);
        $manager->persist($stage4);

        $stage5 = new Stage();
        $stage5->setDateDebut(new \DateTime('2025-03-01'));
        $stage5->setDateFin(new \DateTime('2025-06-15'));
        $stage5->setEntreprise($entreprise1);
        $stage5->setProfSuivi($prof2);
        $stage5->setProfVisite($prof3);
        $stage5->setEtudiant($etudiant5);
        $manager->persist($stage5);

        $manager->flush();
    }
}
