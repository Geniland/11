<?php

namespace App\Controller\Admin;

use App\Entity\Categories;
use App\Entity\Article;
use App\Entity\Hommes;
use App\Entity\NewFemmes;
use App\Repository\HommesRepository;
use App\Repository\NewFemmesRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // Votre code ici pour récupérer les données de l'entité externe
      
    
        return $this->render('admin/my-dashboard.html.twig', [
       
        ]);
    }
    

    
}
