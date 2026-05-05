<?php
namespace  App\Controller;

use App\Entity\Etudiant;
use App\Form\EtudiantType;
use App\Repository\EtudiantRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


#[Route('/etudiants')]
final class EtudiantController extends AbstractController
{
    #[Route(name: 'app_etudiant_index')]
    public function index(EtudiantRepository $etudiantRepository): Response
    {
        $listeEtudiants = $etudiantRepository->findAllOrderedByNom();
        $nombreTotalEtudiants = $etudiantRepository->countAllEtudiants();
        $nombreEtudiantsSlam = $etudiantRepository->countByFiliere('SLAM');
        $nombreEtudiantsSisr = $etudiantRepository->countByFiliere('SISR');

        return $this->render('etudiant/index.html.twig', [
            'etudiants' => $listeEtudiants, 
            'nombreTotalEtudiants' => $nombreTotalEtudiants,
            'nombreEtudiantsSlam' => $nombreEtudiantsSlam,
            'nombreEtudiantsSisr' => $nombreEtudiantsSisr,
        ]);
    }
    #[Route('/new', name: 'app_etudiant_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $etudiant = new Etudiant();
        $form = $this->createForm(EtudiantType::class, $etudiant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $etudiant->setIsArchived(false);
            $em->persist($etudiant);
            $em->flush();

            return $this->redirectToRoute('app_etudiant_index');
        }

        return $this->render('etudiant/new.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_etudiant_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Etudiant $etudiant, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(EtudiantType::class, $etudiant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();

            return $this->redirectToRoute('app_etudiant_index');
        }

        return $this->render('etudiant/edit.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_etudiant_delete', methods: ['POST'])]
    public function delete(Request $request, Etudiant $etudiant, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete'.$etudiant->getId(), $request->request->get('_token'))) {
            $etudiant->setIsArchived(true);
            $em->flush();
        }

        return $this->redirectToRoute('app_etudiant_index');
    }
}