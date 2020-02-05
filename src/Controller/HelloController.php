<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{
    /**
     * @Route("/hello/{name}", name="hello")
     *
     * @param String $name
     * @param Request $request
     *
     * @return Response
     */
    public function index(String $name, Request $request): Response
    {
        return $this->render('hello/index.html.twig', [
            'name' => $name,
        ]);
    }
}
