<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{

    /**
     * @Route ("/blog/{page}", name="blog_list", requirements={"page"="\d+"})
     */

    public function list(int $page = 1): Response
    {

    }

    /**
     * @Route ("/blog/{slug}", name="blog_show")
     */

    public function show(string $slug): Response
    {

    }

    /**
     * @Route ("/api/posts/{id}", methods = {"PUT"})
     */

    public function edit(int $id): Response
    {

    }

    /**
     * @Route ("/blog/{page}", name="blog_index", defaults={"page": 1, "title": "Hello World!"})
     */

    public function index(int $page, string $title): Response
    {

    }
}