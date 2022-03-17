<?php

namespace App\Controller;

use App\Services\Mailer;
use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    public function index(Request $request, Mailer $mailer)
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $contactFormData = $form->getData();
            
            $mailer->sendEmailContact($contactFormData);

            $this->addFlash('success', 'Votre demande de prise de contact a bien été envoyé.');
            
            return $this->redirectToRoute('contact');
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
