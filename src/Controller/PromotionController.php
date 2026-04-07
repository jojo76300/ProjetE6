<?php

namespace App\Controller;
use App\Repository\PromotionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
class PromotionController extends AbstractController
{
    #[Route('/promotions', name: 'app_promotion_index')]
    public function index(PromotionRepository $promotionRepository): Response
    {
        $promotions = $promotionRepository->findAll();

        return $this->render('promotion/index.html.twig', [
            'promotions' => $promotions,
        ]);
    }
}