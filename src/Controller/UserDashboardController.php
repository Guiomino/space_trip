<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;
use App\Repository\StayRepository;

class UserDashboardController extends AbstractController
{
    /**
     * @Route("/dashboard", name="user_dashboard")
     */
    public function dashboard(UserRepository $userRepository, StayRepository $stayRepository): Response
    {
        $user = $this->getUser();
        $userStays = $stayRepository->findBy(['user' => $user]);

        return $this->render('user_dashboard/dashboard.html.twig', [
            'user' => $user,
            'userStays' => $userStays,
        ]);
    }
}
