<?php

namespace WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use WebsiteBundle\Form\Type\ContactType;

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
    
    public function quiMaPratiqueAction()
    {
        return $this->render('WebsiteBundle:Website:qui_ma_pratique.html.twig');
    }
    
    public function bibliographieAction()
    {
        return $this->render('WebsiteBundle:Website:bibliographie.html.twig');
    }
    
    public function contactAction(Request $request)
    {
        $form = $this->createForm(ContactType::class);
        
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $data = $form->getData();
            $message = \Swift_Message::newInstance()->setSubject($data['subject'])->setFrom($data['email'])->setTo('doremiska@gmail.com')
                ->setBody($this->renderView('Emails/email_contact.html.twig', array(
                        'firstName' => $data['firstName'],
                        'lastName' => $data['lastName'],
                        'email' => $data['email'],
                        'tel' => $data['tel'],
                        'subject' => $data['subject'],
                        'content' => $data['content']
                )),'text/html');
            $this->get('mailer')->send($message);
            $request->getSession()->getFlashBag()->add('notice', "Votre message a bien été envoyé.");
            return $this->redirect($this->generateUrl('website_contact').'#formulaire_contact');  
        }
        
        return $this->render('WebsiteBundle:Website:contact.html.twig', array('form' => $form->createView()));
    }
}
