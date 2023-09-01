<?php

namespace App\Controller;

use App\Entity\NewFemmes;
use App\Form\NewFemmesType;
use App\Repository\NewFemmesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/new/femmes')]
class NewFemmesController extends AbstractController
{
    #[Route('/', name: 'app_new_femmes_index', methods: ['GET'])]
    public function index(NewFemmesRepository $newFemmesRepository): Response
    {
        return $this->render('admin/new-dashboard.html.twig', [
            'new_femmes' => $newFemmesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_new_femmes_new', methods: ['GET', 'POST'])]
    public function new(Request $request, NewFemmesRepository $newFemmesRepository): Response
    {
        $newFemme = new NewFemmes();
        $form = $this->createForm(NewFemmesType::class, $newFemme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $newFemmesRepository->save($newFemme, true);

            return $this->redirectToRoute('app_new_femmes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('new_femmes/new.html.twig', [
            'new_femme' => $newFemme,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_new_femmes_show', methods: ['GET'])]
    public function show(NewFemmes $newFemme): Response
    {
        return $this->render('new_femmes/show.html.twig', [
            'new_femme' => $newFemme,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_new_femmes_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, NewFemmes $newFemme, NewFemmesRepository $newFemmesRepository): Response
    {
        $form = $this->createForm(NewFemmesType::class, $newFemme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $newFemmesRepository->save($newFemme, true);

            return $this->redirectToRoute('app_new_femmes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('new_femmes/edit.html.twig', [
            'new_femme' => $newFemme,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_new_femmes_delete', methods: ['POST'])]
    public function delete(Request $request, NewFemmes $newFemme, NewFemmesRepository $newFemmesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$newFemme->getId(), $request->request->get('_token'))) {
            $newFemmesRepository->remove($newFemme, true);
        }

        return $this->redirectToRoute('app_new_femmes_index', [], Response::HTTP_SEE_OTHER);
    }
}
