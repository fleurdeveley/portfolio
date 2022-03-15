<?php

namespace App\Listener;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Twig\Environment;

class ExceptionListener
{
    protected $parameterBag;
    protected $twig;

    public function __construct(Environment $twig, ParameterBagInterface $parameterBag)
    {
        $this->parameterBag = $parameterBag;
        $this->twig = $twig;
    }

    public function onKernelException(ExceptionEvent $event)
    {
        // You get the exception object from the received event
        $exception = $event->getThrowable();
        $message = $exception->getMessage();

        // Customize your response object to display the exception details

        // HttpExceptionInterface is a special type of exception that holds status code and header details
        if ($exception instanceof HttpExceptionInterface) {
            $response = new Response($this->twig->render('listener/error.html.twig', ['message' => 'Oups, la page n\'existe pas.']));
            $response->setStatusCode($exception->getStatusCode());
        } else {
            if ($this->parameterBag->get('APP_ENV') === 'dev') {
                dd($exception);
            } else {
                $response = new Response($this->twig->render('listener/error.html.twig', ['message' => 'Oups, une erreur est survenue.']));
                $response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }

        // sends the modified response object to the event
        $event->setResponse($response);
    }
}
