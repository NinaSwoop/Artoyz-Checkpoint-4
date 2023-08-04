<?php

namespace App\Controller;

use App\Entity\Toy;
use App\Entity\User;
use App\Repository\BrandRepository;
use App\Repository\ToyRepository;
use App\Repository\UserRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
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

    #[Route('/toys/{id}/isfavorite', name: 'app_favorite')]
    public function addToFavorite(int $id, Toy $toy, UserRepository $userRepository, ToyRepository $toyRepository): Response
    {
        /** @var \App\Entity\User $user */
        $user = $this->getUser();
        // if (!$user) {
        //     throw new AccessDeniedException('You must be logged in to perform this action.');
        // }

        $toys = $toyRepository->find($id);
        if (!$toy) {
            throw $this->createNotFoundException('The toy with ID ' . $id . ' does not exist.');
        }

        if ($user->isInFavorite($toy)) {
            $user->removeIsFavorite($toy);
        } else {
            $user->addIsFavorite($toy);
        }

        $userRepository->save($user, true);

        return $this->json([
            'isInFavorite' => $user->isInFavorite($toys)
        ]);
    }

    #[IsGranted('ROLE_USER')]
    #[Route('/favorites', name: 'app_favorites')]
    public function fav(ToyRepository $toyRepository): Response
    {
        $toys = $toyRepository->findAll();

        return $this->render('product/favorites.html.twig', [
            'toys' => $toys,
        ]);
    }
}
