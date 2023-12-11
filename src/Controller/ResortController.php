<?php
// src/Controller/ResortController.php
namespace App\Controller;

use App\Entity\Activities;
use App\Entity\Resort;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ResortController extends AbstractController
{
    #[Route('/resorts', name: 'app_resorts')]
    public function index(EntityManagerInterface $entityManager, Request $request): Response
    {

        $resortRepository = $entityManager->getRepository(Resort::class);
        $allResorts = $resortRepository->findAll();


        $selectedResort = null;
        $selectedResortId = $request->query->get('id');
        $selectedResortIndex = 0;

        if ($selectedResortId) {
            $selectedResort = $resortRepository->find($selectedResortId);
            $selectedResortIndex = array_search($selectedResort, $allResorts);
        }


        $activitiesRepository = $entityManager->getRepository(Activities::class);
        $activities = $selectedResort ? $activitiesRepository->findBy(['resort' => $selectedResort]) : [];

        return $this->render('resort/index.html.twig', [
            'controller_name' => 'ResortController',
            'allResorts' => $allResorts,
            'selectedResort' => $selectedResort,
            'selectedResortIndex' => $selectedResortIndex,
            'activities' => $activities,
        ]);
    }
}
