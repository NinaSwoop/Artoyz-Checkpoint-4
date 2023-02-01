<?php

namespace App\Controller;

use App\Entity\Toy;
use App\Repository\BrandRepository;
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

    #[Route('/brands', name: 'app_brands')]
    public function brands(BrandRepository $brandRepository, ToyRepository $toyRepository): Response
    {
        $brands = $brandRepository->findAll();
        $toys = $toyRepository->findAll();

        return $this->render('product/brands.html.twig', [
            'brands' => $brands,
            'toys' => $toys,
        ]);
    }

    #[Route('/show/{id}', name: 'app_show')]
    public function show(ToyRepository $toyRepository, Toy $toy): Response
    {

        return $this->render('product/show.html.twig', [
            'toy' => $toy,
        ]);
    }
}
