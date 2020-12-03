<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JustTestController extends AbstractController
{
    /**
     * @Route("/just/test", name="just_test")
     */
    public function index(): Response
    {
        return $this->render('just_test/index.html.twig', [
            'controller_name' => 'JustTestController',
        ]);
    }
}
