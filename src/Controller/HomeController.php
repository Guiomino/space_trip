<?php

namespace App\Controller;

use App\Entity\Planet;
use App\Entity\PlanetCharacteristics;
use App\Entity\Resort;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(EntityManagerInterface $entityManager): Response
    {

        $resortRepository = $entityManager->getRepository(Resort::class);
        $resorts = $resortRepository->findAll();

        $planetRepository = $entityManager->getRepository(Planet::class);
        $planet = $planetRepository->findOneBy([]);

        $planetCharacteristicsRepository = $entityManager->getRepository(PlanetCharacteristics::class);
        $planetCharacteristics = $planetCharacteristicsRepository->findOneBy([]);


        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'resorts' => $resorts,
            'planet' => $planet,
            'planetCharacteristics' => $planetCharacteristics,

        ]);
    }
}
