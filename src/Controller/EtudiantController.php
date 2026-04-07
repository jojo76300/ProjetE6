<?php
namespace  App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\EtudiantRepository;

class EtudiantController extends AbstractController
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
        $nombreTotalEtudiants = $etudiantRepository->countAllEtudiants();
        $nombreEtudiantsSlam = $etudiantRepository->countByFiliere('SLAM');
        $nombreEtudiantsSisr = $etudiantRepository->countByFiliere('SISR');

        // 2. On "envoie" la variable au Twig
        return $this->render('pageDeTest.html.twig', [
            'etudiants' => $listeEtudiants, 
            'nombreTotalEtudiants' => $nombreTotalEtudiants,
            'nombreEtudiantsSlam' => $nombreEtudiantsSlam,
            'nombreEtudiantsSisr' => $nombreEtudiantsSisr,
        ]);
    }
}