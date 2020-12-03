<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Psr\Log\LoggerInterface;

class LuckyController extends AbstractController
{
    /**
     * @Route("/lucky/number/{max}", name = "app_lucky_number")
     */

    public function number(int $max, LoggerInterface $logger)
    {

        $number = random_int(0, $max);

        $url = $this->generateUrl('app_lucky_number', ['max'=>10]);

        return $this->render('lucky\number.html.twig', [
            'number' => $number,
        ]);

//        return $this->redirect('http://vk.com');
    }
}