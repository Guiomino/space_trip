<?php
    // src/Controller/UserDashboardController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;

class UserDashboardController extends AbstractController
{
    /**
     * @Route("/dashboard", name="user_dashboard")
     */
    #[Route('/dashboard', name: 'app_dashboard')]
    public function dashboard(UserRepository $userRepository): Response
    {
        // Récupérez l'utilisateur actuel (par exemple, l'utilisateur connecté)
        $user = $this->getUser();

        // Si vous avez un ID d'utilisateur spécifique, vous pouvez le récupérer depuis la base de données
        // $user = $userRepository->find($userId); // Remplacez $userId par l'ID de l'utilisateur que vous souhaitez afficher

        // Passez l'utilisateur à la vue
        return $this->render('user_dashboard/dashboard.html.twig', ['user' => $user]);
    }
}
