<?php

namespace App\Controller;

use App\Entity\Toy;
use App\Form\ToyType;
use App\Repository\BrandRepository;
use App\Repository\ToyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(ToyRepository $toyRepository, BrandRepository $brandRepository): Response
    {
        $toys = $toyRepository->findAll();
        $brands = $brandRepository->findAll();

        return $this->render('dashboard/index.html.twig', [
            'toys' => $toys,
            'brands' => $brands,
        ]);
    }

    #[Route('/new-toy', name: 'app_toy_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ToyRepository $toyRepository): Response
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

    #[Route('/{id}/edit', name: 'app_toy_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Toy $toy, ToyRepository $toyRepository): Response
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

    #[Route('/{id}', name: 'app_toy_delete', methods: ['POST'])]
    public function delete(Request $request, Toy $toy, ToyRepository $toyRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $toy->getId(), $request->request->get('_token'))) {
            $toyRepository->remove($toy, true);
        }

        return $this->redirectToRoute('app_dashboard', [], Response::HTTP_SEE_OTHER);
    }
}
