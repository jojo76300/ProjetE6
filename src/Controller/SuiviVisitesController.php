<?php
// src/Controller/SuiviVisitesController.php
namespace App\Controller;

use App\Entity\Visite;
use App\Form\VisiteType;
use App\Repository\VisiteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/suivi-visites')]
class SuiviVisitesController extends AbstractController
{
    #[Route('/', name: 'app_suivi_visites_index', methods: ['GET'])]
    public function index(VisiteRepository $repo): Response
    {
        return $this->render('suivi_visites/index.html.twig', [
            'visites' => $repo->findAllForSuivi(),
        ]);
    }

    #[Route('/new', name: 'app_suivi_visites_new', methods: ['GET','POST'])]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $visite = new Visite();
        $form = $this->createForm(VisiteType::class, $visite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($visite);
            $em->flush();

            return $this->redirectToRoute('app_suivi_visites_index');
        }

        return $this->render('suivi_visites/new.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_suivi_visites_edit', methods: ['GET','POST'])]
    public function edit(Request $request, Visite $visite, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(VisiteType::class, $visite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            return $this->redirectToRoute('app_suivi_visites_index');
        }

        return $this->render('suivi_visites/edit.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_suivi_visites_delete', methods: ['POST'])]
    public function delete(Request $request, Visite $visite, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete'.$visite->getId(), $request->request->get('_token'))) {
            $em->remove($visite);
            $em->flush();
        }

        return $this->redirectToRoute('app_suivi_visites_index');
    }
}
