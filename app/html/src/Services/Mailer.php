<?php

namespace App\Services;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;

class Mailer
{
    protected $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendEmailContact($contactFormData)
    {
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
            
        $this->mailer->send($email);
    }
}
