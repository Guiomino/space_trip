<?php

// src/Controller/AccommodationFormController.php

namespace App\Controller;


use App\Repository\AccommodationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccommodationFormController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/accommodation/form', name: 'app_accommodation_form')]
    public function index(Request $request, AccommodationRepository $accommodationRepository): Response
    {
        $accommodations = $accommodationRepository->findAll();

        $form = $this->createFormBuilder();

        foreach ($accommodations as $accommodation) {
            $form->add('selectedAccommodation_' . $accommodation->getId(), SubmitType::class, [
                'label' => 'Confirm',
                'attr' => ['value' => $accommodation->getId()],
            ]);
        }

        $form = $form->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $selectedAccommodationId = $request->request->get('form')['selectedAccommodation'];

            // Faites quelque chose avec l'ID sélectionné, par exemple, redirigez vers une autre page
            return $this->redirectToRoute('app_selected_accommodation', ['id' => $selectedAccommodationId]);
        }

        return $this->render('accommodation_form/index.html.twig', [
            'accommodations' => $accommodations,
            'form' => $form->createView(),
        ]);
    }
}
