<?php
// src/Controller/ResortController.php
namespace App\Controller;

use App\Entity\Resort;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ResortController extends AbstractController
{
    #[Route('/resorts', name: 'app_resorts')]
    public function index(EntityManagerInterface $entityManager): Response
    {

       

        $resortRepository = $entityManager->getRepository(Resort::class);
        $resorts = $resortRepository->findAll();

        return $this->render('resort/index.html.twig', [
            'controller_name' => 'ResortController',
            'resorts' => $resorts,
        ]);
    }
}
