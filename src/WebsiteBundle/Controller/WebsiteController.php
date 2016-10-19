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
    
    public function sophrologieIndividuelAction()
    {
        return $this->render('WebsiteBundle:Website:sophro_individuel.html.twig');
    }
    
    public function sophrologieGroupeAction()
    {
        return $this->render('WebsiteBundle:Website:sophro_groupe.html.twig');
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
    
    public function quiFormationParcoursAction()
    {
        return $this->render('WebsiteBundle:Website:qui_formation_parcours.html.twig');
    }
    
    public function quiMesValeursAction()
    {
        return $this->render('WebsiteBundle:Website:qui_mes_valeurs.html.twig');
    }
    
    public function bibliographieAction()
    {
        return $this->render('WebsiteBundle:Website:bibliographie.html.twig');
    }
    
    public function contactAction()
    {
        return $this->render('WebsiteBundle:Website:contact.html.twig');
    }
}
