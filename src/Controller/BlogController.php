<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{

    public function recentArticles(int $max = 3): Response
    {
        /**
         * @Route("/blog/sd", name="blog")
         */

        // get the recent articles somehow (e.g. making a database query)
        $articles = ['...', '...', '...'];

        return $this->render('blog/_recent_articles.html.twig', [
            'articles' => $articles
        ]);
    }
}