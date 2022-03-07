<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\Mime\Email;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    public function index(Request $request, MailerInterface $mailer)
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $contactFormData = $form->getData();
            
            $email = (new TemplatedEmail())
                ->from('fleurdeveley@gmail.com')
                ->to('fleurdeveley@gmail.com')
                ->subject('Vous avez reçu une demande de contact.')
                ->htmlTemplate('emails/contact.html.twig')
                ->context([
                    'fullName' => $contactFormData['fullName'],
                    'from' => $contactFormData['email'],
                    'phone' => $contactFormData['phone'],
                    'message' => $contactFormData['message'],
                ]);
            
            $mailer->send($email);

            $this->addFlash('success', 'Votre demande de prise de contact a bien été envoyé.');
            
            return $this->redirectToRoute('contact');
        }
        return $this->render('contact/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
