<?php

namespace App\Controller;

use App\Entity\Accommodation;
use App\Entity\Resort;
use App\Entity\Stay;
use App\Form\StayFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class StayController extends AbstractController
{




    public function confirmation(): Response
    {
        return $this->render('stay_confirmation/index.html.twig');
    }



    public function getStartingPrice(Resort $resort)
    {
        $startingPrice = $resort->getStartingPrice();
        return new JsonResponse(['startingPrice' => $startingPrice]);
    }


    public function getAccommodationPrice(Accommodation $accommodation)
    {
        // Récupérer le price de accommodation
        $price = $accommodation->getPrice();

        // Retourner le au format JSON
        return new JsonResponse(['price' => $price]);
    }



    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/stay', name: 'app_stay')]
    public function createProduct(Request $request): Response
    {
        $stay = new Stay();
        $form = $this->createForm(StayFormType::class, $stay);





        $resort = $stay->getResort();
        if ($resort) {
            $startingPrice = $resort->getStartingPrice();
            // Transmettez le prix de départ au formulaire
            $form->get('starting_price')->setData($startingPrice);
        }




        $accommodation = $stay->getAccommodation();
        if ($accommodation) {
            $price = $accommodation->getPrice();
            $form->get('accommodation_price')->setData($price);
        }




        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->getUser();
            $stay->setUser($user);

            $this->entityManager->persist($stay);
            $this->entityManager->flush();

            $stayId = $stay->getId();

            return $this->redirectToRoute('app_stay_confirmation', [
                'stayId' => $stayId,
            ]);
        }

        return $this->render('stay/index.html.twig', [
            'controller_name' => 'StayController',
            'form' => $form->createView(),
        ]);
    }
}

