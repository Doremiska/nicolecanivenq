<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{
    public function loginAction(Request $request)
    {
        // Si le visiteur est déjà identifié, on le redirige vers l'accueil
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirectToRoute('website_index');
        }
        
        $authentificationUtils = $this->get('security.authentication_utils');
        
        return $this->render('UserBundle:Security:login.html.twig', array(
            'last_username' => $authentificationUtils->getLastUsername(),
            'error'         => $authentificationUtils->getLastAuthenticationError()
        ));
    }
}
