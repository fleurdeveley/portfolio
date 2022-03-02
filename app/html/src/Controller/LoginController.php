<?php

namespace App\Controller;

use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

  class LoginController extends AbstractController
  {
    public function login(AuthenticationUtils $authenticationUtils): Response
      {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('login/index.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error
        ]);
      }

      public function logout(): void
      {
          // controller can be blank: it will never be called!
          // throw new \Exception('Don\'t forget to activate logout in security.yaml');
      }
  }
