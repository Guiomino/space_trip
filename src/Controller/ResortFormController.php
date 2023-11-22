<?php

// src/Controller/ResortFormController.php
namespace App\Controller;

use App\Entity\Resort;
use App\Form\ResortFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ResortFormController extends AbstractController
{
    #[Route('/resort/form', name: 'app_resort_form')]
    public function index(EntityManagerInterface $entityManager, Request $request): Response
    {
        // Étape 1: Récupérer tous les resorts de la base de données
        $resorts = $entityManager->getRepository(Resort::class)->findAll();

        // Étape 2: Créer un formulaire ResortFormType
        // Notez que cette fois, nous ne créons pas une nouvelle instance de Resort, car nous n'en avons pas besoin ici
        // Nous fournissons plutôt les resorts comme choix au formulaire
        $form = $this->createForm(ResortFormType::class, null, [
            'resorts' => $resorts,
        ]);

        // Étape 3: Gérer la soumission du formulaire
        $form->handleRequest($request);

        // Étape 4: Vérifier si le formulaire a été soumis et est valide
        if ($form->isSubmitted() && $form->isValid()) {
            // Étape 5: Persistez le nouvel objet Resort dans la base de données
            $entityManager->persist($form->getData());
            $entityManager->flush();

            // Étape 6: Redirigez l'utilisateur vers la page des resorts après la soumission réussie
            return $this->redirectToRoute('app_resorts');
        }

        // Étape 7: Rendre la vue du formulaire avec le formulaire et d'autres données nécessaires
        return $this->render('resort_form/index.html.twig', [
            'controller_name' => 'ResortFormController',
            'form' => $form->createView(),
        ]);
    }
}
