<?php

namespace App\Controller;

use App\Entity\Femmes;
use App\Form\FemmesType;
use App\Repository\FemmesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/femmes')]
class FemmesController extends AbstractController
{
    #[Route('/', name: 'app_femmes_index', methods: ['GET'])]
    public function index(FemmesRepository $femmesRepository): Response
    {
        return $this->render('femmes/index.html.twig', [
            'femmes' => $femmesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_femmes_new', methods: ['GET', 'POST'])]
    public function new(Request $request, FemmesRepository $femmesRepository): Response
    {
        $femme = new Femmes();
        $form = $this->createForm(FemmesType::class, $femme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $femmesRepository->save($femme, true);

            return $this->redirectToRoute('app_femmes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('femmes/new.html.twig', [
            'femme' => $femme,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_femmes_show', methods: ['GET'])]
    public function show(Femmes $femme): Response
    {
        return $this->render('femmes/show.html.twig', [
            'femme' => $femme,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_femmes_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Femmes $femme, FemmesRepository $femmesRepository): Response
    {
        $form = $this->createForm(FemmesType::class, $femme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $femmesRepository->save($femme, true);

            return $this->redirectToRoute('app_femmes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('femmes/edit.html.twig', [
            'femme' => $femme,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_femmes_delete', methods: ['POST'])]
    public function delete(Request $request, Femmes $femme, FemmesRepository $femmesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$femme->getId(), $request->request->get('_token'))) {
            $femmesRepository->remove($femme, true);
        }

        return $this->redirectToRoute('app_femmes_index', [], Response::HTTP_SEE_OTHER);
    }
}
