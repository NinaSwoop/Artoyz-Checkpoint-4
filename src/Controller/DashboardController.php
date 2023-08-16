<?php

namespace App\Controller;

use App\Entity\Brand;
use App\Entity\Toy;
use App\Form\BrandType;
use App\Form\ToyType;
use App\Repository\BrandRepository;
use App\Repository\ToyRepository;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    #[IsGranted('ROLE_ADMIN')]
    public function index(ToyRepository $toyRepository, BrandRepository $brandRepository): Response
    {
        $toys = $toyRepository->findAll();
        $brands = $brandRepository->findAll();

        return $this->render('dashboard/index.html.twig', [
            'toys' => $toys,
            'brands' => $brands,
        ]);
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/new-toy', name: 'app_toy_new', methods: ['GET', 'POST'])]
    public function newToy(Request $request, ToyRepository $toyRepository): Response
    {

        $toy = new Toy();
        $toyNewForm = $this->createForm(ToyType::class, $toy);

        $toyNewForm->handleRequest($request);
        // Was the form submitted ?
        if ($toyNewForm->isSubmitted() && $toyNewForm->isValid()) {

            $toyRepository->save($toy, true);

            return $this->redirectToRoute('app_dashboard');
        }
        return $this->render('dashboard/newToy.html.twig', [
            'toyNewform' => $toyNewForm,
            'toy' => $toy,
        ]);
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/{id}/edit-toy', name: 'app_toy_edit', methods: ['GET', 'POST'])]
    public function editToy(Request $request, Toy $toy, ToyRepository $toyRepository): Response
    {
        $toyEditForm = $this->createForm(ToyType::class, $toy);
        $toyEditForm->handleRequest($request);

        if ($toyEditForm->isSubmitted() && $toyEditForm->isValid()) {

            $toyRepository->save($toy, true);

            return $this->redirectToRoute('app_dashboard', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('dashboard/editToy.html.twig', [
            'toy' => $toy,
            'toyEditForm' => $toyEditForm,
        ]);
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/{id}/delete-toy', name: 'app_toy_delete', methods: ['POST'])]
    public function deleteToy(Request $request, Toy $toy, ToyRepository $toyRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $toy->getId(), $request->request->get('_token'))) {
            $toyRepository->remove($toy, true);
        }

        return $this->redirectToRoute('app_dashboard', [], Response::HTTP_SEE_OTHER);
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/new-brand', name: 'app_brand_new', methods: ['GET', 'POST'])]
    public function new(Request $request, BrandRepository $brandRepository): Response
    {

        $brand = new Brand();
        $brandNewForm = $this->createForm(BrandType::class, $brand);

        $brandNewForm->handleRequest($request);

        if ($brandNewForm->isSubmitted() && $brandNewForm->isValid()) {

            $brandRepository->save($brand, true);

            return $this->redirectToRoute('app_dashboard');
        }
        return $this->render('dashboard/newBrand.html.twig', [
            'brandNewForm' => $brandNewForm,
            'brand' => $brand,
        ]);
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/{id}/edit-brand', name: 'app_brand_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Brand $brand, BrandRepository $brandRepository): Response
    {
        $brandEditForm = $this->createForm(BrandType::class, $brand);
        $brandEditForm->handleRequest($request);

        if ($brandEditForm->isSubmitted() && $brandEditForm->isValid()) {

            $brandRepository->save($brand, true);

            return $this->redirectToRoute('app_dashboard', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('dashboard/editBrand.html.twig', [
            'brand' => $brand,
            'brandEditForm' => $brandEditForm,
        ]);
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/{id}/delete-brand', name: 'app_brand_delete', methods: ['POST'])]
    public function delete(Request $request, Brand $brand, BrandRepository $brandRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $brand->getId(), $request->request->get('_token'))) {
            $brandRepository->remove($brand, true);
        }

        return $this->redirectToRoute('app_dashboard', [], Response::HTTP_SEE_OTHER);
    }
}
