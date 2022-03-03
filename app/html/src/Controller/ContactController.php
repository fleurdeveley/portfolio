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
            
            $message = (new Email())
                ->from($contactFormData['email'])
                ->to('fleurdeveley@gmail.com')
                ->subject('Vous avez reçu un email de contact.')
                ->text('Sender : '.$contactFormData['email'].\PHP_EOL.
                    $contactFormData['Message'],
                    'text/plain');
            
            $mailer->send($message);
            $this->addFlash('success', 'Vore prise de contacte a été envoyé.');

            $email = new TemplatedEmail();
            $email->to($contactFormData['email'])
                ->from('fleurdeveley@gmail.com')
                ->subject('Vous avez reçu un email de contact.')
                ->htmlTemplate('emails/validation.html.twig');
            
            $this->mailer->send($email);
            
            return $this->redirectToRoute('index');
        }
        return $this->render('contact/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
