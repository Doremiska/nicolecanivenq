<?php

namespace WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WebsiteController extends Controller
{
    public function indexAction()
    {
        return $this->render('WebsiteBundle:Website:index.html.twig');
    }
    
    public function sophrologieAction()
    {
        return $this->render('WebsiteBundle:Website:sophrologie.html.twig');
    }
    
    public function sophrologieDeroulementSeanceAction()
    {
        return $this->render('WebsiteBundle:Website:sophro_deroulement_seance.html.twig');
    }
    
    public function sophrologiePourQuiAction()
    {
        return $this->render('WebsiteBundle:Website:sophro_pour_qui.html.twig');
    }
    
    public function sophrologieBeneficesAction()
    {
        return $this->render('WebsiteBundle:Website:sophro_benefices.html.twig');
    }
    
    public function sophrologieGroupeAction()
    {
        return $this->render('WebsiteBundle:Website:sophro_groupe.html.twig');
    }
    
    public function sophrologieIndividuelAction()
    {
        return $this->render('WebsiteBundle:Website:sophro_individuel.html.twig');
    }
    
    public function sophrologieAteliersStagesAction()
    {
        return $this->render('WebsiteBundle:Website:sophro_ateliers_stages.html.twig');
    }
    
    public function soinsEnergetiquesAction()
    {
        return $this->render('WebsiteBundle:Website:soins_energetiques.html.twig');
    }
    
    public function quiSuisJeAction()
    {
        return $this->render('WebsiteBundle:Website:qui_suis_je.html.twig');
    }
    
    public function bibliographieAction()
    {
        return $this->render('WebsiteBundle:Website:bibliographie.html.twig');
    }
    
    public function tarifsAction()
    {
        return $this->render('WebsiteBundle:Website:tarifs.html.twig');
    }
    
    public function contactAction()
    {
        return $this->render('WebsiteBundle:Website:contact.html.twig');
    }
}
