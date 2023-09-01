<?php

namespace App\Controller;

use App\Entity\Hommes;
use App\Entity\NewFemmes;
use App\Form\HommesType;
use App\Form\VichImageType;
use Doctrine\DBAL\Types\Types;
use App\Repository\HommesRepository;
use App\Repository\NewFemmesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/Home')]
class HommesController extends AbstractController
{
    #[Route('/', name: 'app_hommes_index', methods: ['GET'])]
    public function index(HommesRepository $hommesRepository , NewFemmesRepository $newFemmesRepository): Response
    {
        $hommes = $hommesRepository->findAll();
        $new_femmes = $newFemmesRepository->findAll();

        foreach ($hommes as $homme ) {
            // Supposons que vous avez une propriété "hommeImages" dans votre entité Hommes
            // Assurez-vous que la propriété "hommeImages" est bien définie dans votre entité
            // Si vous utilisez VichUploaderBundle, vous pouvez récupérer l'image via son getter
            $hommeImages = $homme->getHommeImages(); // Assurez-vous que la propriété s'appelle correctement
            
            // Lire les données binaires à partir de la ressource BLOB
            $imageData = stream_get_contents($hommeImages);

            // Encoder les données en base64
            $base64ImageData = base64_encode($imageData );

            // Ajouter la base64ImageData à l'entité Hommes pour pouvoir y accéder dans votre modèle Twig
            $homme->base64ImageData = $base64ImageData;
            
        }

        foreach ($new_femmes as $new_femme) {
            // Supposons que vous avez une propriété "hommeImages" dans votre entité Hommes
            // Assurez-vous que la propriété "hommeImages" est bien définie dans votre entité
            // Si vous utilisez VichUploaderBundle, vous pouvez récupérer l'image via son getter
             // Assurez-vous que la propriété s'appelle correctement
            $femmeImages = $new_femme->getFemmeImage(); // Assurez-vous que la propriété s'appelle correctement

            // Lire les données binaires à partir de la ressource BLOB
            $imageData = stream_get_contents( $femmeImages);

            // Encoder les données en base64
            $base64ImageData = base64_encode($imageData );

            // Ajouter la base64ImageData à l'entité Hommes pour pouvoir y accéder dans votre modèle Twig
            
            $new_femme->base64ImageData = $base64ImageData;
        }

        return $this->render('admin/new-dashboard.html.twig', [
            'hommes' => $hommes,
            'new_femmes' => $new_femmes,
            
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

    
    #[Route('/all', name: 'app_hommes_all', methods: ['GET'])]
    public function all(HommesRepository $hommesRepository): Response
    {
        return $this->render('hommes/index.html.twig', [
            'Hommes' => $hommesRepository->findAll(),
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
