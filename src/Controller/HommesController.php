<?php

namespace App\Controller;

use App\Entity\Hommes;
use App\Form\HommesType;
use App\Repository\HommesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/hommes')]
class HommesController extends AbstractController
{

  
     


     
    #[Route('/', name: 'app_hommes_index', methods: ['GET'])]
    public function index(HommesRepository $hommesRepository): Response
    {
        return $this->render('admin/my-dashboard.html.twig', [
            'hommes' => $hommesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_hommes_new', methods: ['GET', 'POST'])]
    public function new(Request $request, HommesRepository $hommesRepository): Response
    {
        $homme = new Hommes();
        $form = $this->createForm(HommesType::class, $homme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $hommesRepository->save($homme, true);

            return $this->redirectToRoute('app_hommes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('hommes/new.html.twig', [
            'homme' => $homme,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_hommes_show', methods: ['GET'])]
    public function show(Hommes $homme): Response
    {
        return $this->render('hommes/show.html.twig', [
            'homme' => $homme,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_hommes_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Hommes $homme, HommesRepository $hommesRepository): Response
    {
        $form = $this->createForm(HommesType::class, $homme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $hommesRepository->save($homme, true);

            return $this->redirectToRoute('app_hommes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('hommes/edit.html.twig', [
            'homme' => $homme,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_hommes_delete', methods: ['POST'])]
    public function delete(Request $request, Hommes $homme, HommesRepository $hommesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$homme->getId(), $request->request->get('_token'))) {
            $hommesRepository->remove($homme, true);
        }

        return $this->redirectToRoute('app_hommes_index', [], Response::HTTP_SEE_OTHER);
    }
}
