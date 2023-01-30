<?php

namespace App\Controller;

use App\Repository\ToyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'app_product')]
    public function index(ToyRepository $toyRepository): Response
    {
        $toys = $toyRepository->findAll();

        return $this->render('product/index.html.twig', [
            'toys' => $toys,
        ]);
    }

    #[Route('/toys', name: 'app_toys')]
    public function toys(ToyRepository $toyRepository): Response
    {
        $toys = $toyRepository->findAll();

        return $this->render('product/toys.html.twig', [
            'toys' => $toys,
        ]);
    }
}
