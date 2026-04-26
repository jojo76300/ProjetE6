<?php
namespace App\Controller;

use App\Entity\Stage;
use App\Form\StageType;
use App\Repository\StageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/stage')]
class StageController extends AbstractController
{
    #[Route('/', name: 'app_stage_index', methods: ['GET'])]
    public function index(StageRepository $repo): Response
    {
        return $this->render('stage/index.html.twig', [
            'stages' => $repo->findAllForList(),
        ]);
    }

    #[Route('/new', name: 'app_stage_new', methods: ['GET','POST'])]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $stage = new Stage();
        $form = $this->createForm(StageType::class, $stage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($stage->getDateFin() < $stage->getDateDebut()) {
                $this->addFlash('error', 'La date de fin doit être supérieur à la date de début.');
            } else {
                $em->persist($stage);
                $em->flush();
                return $this->redirectToRoute('app_stage_index');
            }
        }

        return $this->render('stage/new.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_stage_edit', methods: ['GET','POST'])]
    public function edit(Request $request, Stage $stage, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(StageType::class, $stage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($stage->getDateFin() < $stage->getDateDebut()) {
                $this->addFlash('error', 'La date de fin doit être supérieur à la date de début.');
            } else {
                $em->flush();
                return $this->redirectToRoute('app_stage_index');
            }
        }

        return $this->render('stage/edit.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_stage_delete', methods: ['POST'])]
    public function delete(Request $request, Stage $stage, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete'.$stage->getId(), $request->request->get('_token'))) {
            $em->remove($stage);
            $em->flush();
        }

        return $this->redirectToRoute('app_stage_index');
    }
}
