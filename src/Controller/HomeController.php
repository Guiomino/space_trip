<?php

namespace App\Controller;

use App\Entity\ExtraActivities;
use App\Entity\MeansOfTransport;
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

        $extraActivitiesRepository = $entityManager->getRepository(ExtraActivities::class);
        $extraActivities = $extraActivitiesRepository->findAll();
        $icons = [
            0 => 'binoculars',
            1 => 'person-hiking',
            2 => 'jet-fighter-up',
            3 => 'compass',
            4 => 'rocket',
            5 => 'paper-plane',
            6 => 'truck-monster',
            7 => '0',
        ];

        $meansOfTransportRepository = $entityManager->getRepository(MeansOfTransport::class);
        $meansOfTransport = $meansOfTransportRepository->findAll();
        $meansOfTransportTitle = [
            0 => 'Engine type',
            1 => 'Power system',
            2 => 'Navigation system',
            3 => 'Survival system',
            4 => 'Anti-Rad system',
            5 => 'Max speed',
            6 => 'Autonomy',
            7 => 'Pressurization',
            8 => 'Off-Road capability',
            9 => 'Altitude',
            10 => 'Underwater map system',
            11 => 'Capacity',
        ];

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'resorts' => $resorts,
            'planet' => $planet,
            'planetCharacteristics' => $planetCharacteristics,
            'extraActivities' => $extraActivities,
            'icons' => $icons,
            'meansOfTransport' => $meansOfTransport,
            'meansOfTransportTitle' => $meansOfTransportTitle,
        ]);
    }
}
