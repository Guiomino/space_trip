<?php

namespace App\Controller;

use App\Form\UserProfileFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserProfileController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    // Injection de dépendance : le gestionnaire d'entité est passé en paramètre du constructeur
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/profile', name: 'app_profile')]
    public function index(Request $request): Response
    {

        // Obtenez l'utilisateur actuellement connecté
        $user = $this->getUser();

        // Créez un formulaire basé sur le type UserProfileFormType et l'utilisateur actuel
        $form = $this->createForm(UserProfileFormType::class, $user);

        // Gérez la soumission du formulaire
        $form->handleRequest($request);

        // Vérifiez si le formulaire a été soumis et est valide
        if ($form->isSubmitted() && $form->isValid()) {
            // Enregistrez les modifications dans la base de données en utilisant le gestionnaire d'entité
            $this->entityManager->flush();

            // Redirigez l'utilisateur vers la route '/dashboard' après la soumission réussie
            return $this->redirectToRoute('app_dashboard');
        }

        // Rendez la vue avec le formulaire
        return $this->render('user_profile/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}