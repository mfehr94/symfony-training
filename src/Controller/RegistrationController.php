<?php

namespace App\Controller;

use App\Form\RegistrationType;
use App\Security\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    /**
     * @param Request $request
     * @param UserService $service
     *
     * @return Response
     *
     * @Route("/register", name="register")
     */
    public function index(Request $request, UserService $service): Response
    {
        $form = $this->createForm(RegistrationType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $registration = $form->getData();

            $service->createAccount($registration);

            $this->addFlash('success', 'Thanks fort signig up');
            return $this->redirectToRoute('tv_shows_list');
        }

        return $this->render('registration/index.html.twig', [
            'form_view' => $form->createView()
        ]);
    }
}
