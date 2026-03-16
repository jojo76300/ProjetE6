<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use App\Repository\EtudiantRepository;

class DashboardController extends AbstractController
{
    //     #[Route('/page-de-test', name: 'app_page_de_test')]
//     public function pageDeTest(): Response
//     {
//         return $this->render('pageDeTest.html.twig', [
//     'etudiants' => [] // On envoie une liste vide, l'erreur disparaîtra
// ]);
//     }
    #[Route('/etudiants', name: 'app_etudiant_index')]
    public function index(EtudiantRepository $etudiantRepository): Response
    {
        // 1. On récupère tous les étudiants en base de données
        $listeEtudiants = $etudiantRepository->findAll();

        // 2. On "envoie" la variable au Twig
        return $this->render('pageDeTest.html.twig', [
            'etudiants' => $listeEtudiants, // C'est ici que la variable est créée !
        ]);
    }


    #[Route('/menu-test', name: 'app_menu_test')]
    public function menuTest(): Response
    {
        return $this->render('dashboard/menu_test.html.twig');
    }

    // C'est cette route que le AppAuthenticator va appeler si ROLE_ADMIN
    #[Route('/dashboard/all', name: 'app_dashboard_all')]
    #[IsGranted('ROLE_ADMIN')]
    public function adminDashboard(): Response
    {
        return $this->render('dashboard/admin.html.twig', [
            'controller_name' => 'Dashboard Admin',
        ]);
    }

    // C'est cette route que le AppAuthenticator va appeler si ROLE_TEACHER
    #[Route('/dashboard/mystages', name: 'app_dashboard_mystages')]
    #[IsGranted('ROLE_TEACHER')]
    public function teacherDashboard(): Response
    {
        return $this->render('dashboard/teacher.html.twig', [
            'controller_name' => 'Dashboard Enseignant',
        ]);
    }
}
