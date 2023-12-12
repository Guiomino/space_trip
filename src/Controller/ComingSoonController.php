<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ComingSoonController extends AbstractController
{
    #[Route('/comingsoon', name: 'app_comingsoon')]
    public function index(): Response
    {
        return $this->render('coming_soon/index.html.twig', [
            'controller_name' => 'ComingSoonController',
        ]);
    }
}
