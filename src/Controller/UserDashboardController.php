<?php
    // src/Controller/UserDashboardController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserDashboardController extends AbstractController
{
    /**
     * @Route("/dashboard", name="user_dashboard")
     */
    #[Route('/dashboard', name: 'app_dashboard')]
    public function dashboard(): Response
    {
        // Vous pouvez ajouter ici la logique nécessaire pour récupérer les données du tableau de bord

        return $this->render('user_dashboard/dashboard.html.twig');
    }
}
