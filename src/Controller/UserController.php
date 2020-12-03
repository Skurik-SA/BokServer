<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function notification(): Response
    {
        $userFirstName = 'USER';
        $userNotifications = ['.....', '.......'];

        return $this->render('user/notification.html.twig', [
            'user_first_name' => $userFirstName,
            'notifications' => $userNotifications,
        ]);
    }
}
