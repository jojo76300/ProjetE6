<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class DashboardController extends AbstractController
{
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
