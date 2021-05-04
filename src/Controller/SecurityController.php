<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request, AuthenticationUtils $authUtils)
    {
        return $this->render('security/login.html.twig', array(
            'last_username' => $authUtils->getLastUsername(),
            'error' => $authUtils->getLastAuthenticationError(),
            'title' => 'Вход в панель управления'
        ));
    }

    /**
     * @Route("/logout", name="logout", methods={"GET"})
     */
    public function logout(): void
    {
        throw new \Exception('Don\'t forget to activate logout in security.yaml');
    }
}