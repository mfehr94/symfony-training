<?php

declare(strict_types=1);

namespace App\Controller;

use App\Contact\ContactHandler;
use App\Form\ContactMessageType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @param Request $request
     * @param ContactHandler $notifier
     *
     * @return Response
     *
     * @Route("/contact", name="contact", methods={"GET", "POST"})
     */
    public function contact(Request $request, ContactHandler $notifier): Response
    {
        $form = $this->createForm(ContactMessageType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $notifier->handleNewMessage($form->getData());

            $this->addFlash('success', 'Thanks for reaching out!');

            return $this->redirectToRoute('tv_shows_list');
        }

        return $this->render(
            'contact/contact.html.twig',
            [
                'form_view' => $form->createView()
            ]
        );
    }
}
