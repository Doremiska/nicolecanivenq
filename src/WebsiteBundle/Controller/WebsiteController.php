<?php

namespace WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use WebsiteBundle\Form\Type\ContactType;
use WebsiteBundle\Form\Type\ContactRDVType;

class WebsiteController extends Controller
{
    public function indexAction()
    {
        return $this->render('WebsiteBundle:Website:index.html.twig');
    }
    
    public function sideBarAdvertsAction() 
    {
        $em = $this->getDoctrine()->getManager();
        
        $date = new \Datetime();
        $date->modify('-1day');
        
        $listAdverts = $em->getRepository('AdminBundle:Advert')->getLastAdverts($date);
        
        return $this->render('WebsiteBundle:Website:inc_sideBarAdverts.html.twig', array(
            'listAdverts' => $listAdverts
        ));
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
        $em = $this->getDoctrine()->getManager();
        $date = new \Datetime();
        $date->modify('-1day');
        
        $listAdverts1 = $em->getRepository('AdminBundle:Advert')->getAdvertsAddress($date, 1);
        $listAdverts2 = $em->getRepository('AdminBundle:Advert')->getAdvertsAddress($date, 2);
        $listAdverts3 = $em->getRepository('AdminBundle:Advert')->getAdvertsAddress($date, 3);
        
        return $this->render('WebsiteBundle:Website:sophro_ateliers_stages.html.twig', array(
            'listAdverts1' => $listAdverts1,
            'listAdverts2' => $listAdverts2,
            'listAdverts3' => $listAdverts3
        ));
    }
    
    public function actualitesAction($id) 
    {
        $em = $this->getDoctrine()->getManager();
        
        // On récupère l'article d'id $id
        $advert = $em->getRepository('AdminBundle:Advert')->find($id);
        
        if ($advert === null) {
            throw new NotFoundHttpException("L'actualité d'id ".$id." n'existe pas.");
        }
         
        return $this->render('WebsiteBundle:Website:actualites.html.twig', array(
            'advert' => $advert
        ));
    }
    
    public function soinsEnergetiquesAction()
    {
        return $this->render('WebsiteBundle:Website:soins_energetiques.html.twig');
    }
    
    public function soinsAuratherapieMagnetismeAction()
    {
        return $this->render('WebsiteBundle:Website:soins_ener_therapies.html.twig');
    }
    
    public function soinsChamaniquesAction()
    {
        return $this->render('WebsiteBundle:Website:soins_ener_chamaniques.html.twig');
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
    
    public function biblioMediasAction()
    {
        return $this->render('WebsiteBundle:Website:biblio_medias.html.twig');
    }
    
    public function contactAction(Request $request)
    {
        $form = $this->createForm(ContactType::class);
        
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $data = $form->getData();
            $message = \Swift_Message::newInstance()->setSubject($data['subject'])->setFrom($data['email'])->setTo('nicole.canivenq@worldonline.fr')
//            $message = \Swift_Message::newInstance()->setSubject($data['subject'])->setFrom($data['email'])->setTo('doremiska@gmail.com')
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
    
    public function contactRDVAction(Request $request)
    {
        $form = $this->createForm(ContactRDVType::class);
        
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $data = $form->getData();
            $message = \Swift_Message::newInstance()->setSubject("Demande de rendez-vous")->setFrom($data['email'])->setTo('nicole.canivenq@worldonline.fr')
//            $message = \Swift_Message::newInstance()->setSubject("Demande de rendez-vous")->setFrom($data['email'])->setTo('doremiska@gmail.com')
                ->setBody($this->renderView('Emails/email_contact_rdv.html.twig', array(
                        'firstName' => $data['firstName'],
                        'lastName' => $data['lastName'],
                        'email' => $data['email'],
                        'tel' => $data['tel'],
                        'appointmentFor' => $data['appointmentFor'],
                        'availableDay' => $data['availableDay'],
                        'availableTime' => $data['availableTime'],
                        'content' => $data['content']
                )),'text/html');
            $this->get('mailer')->send($message);
            $request->getSession()->getFlashBag()->add('notice', "Votre demande de rendez-vous a bien été envoyée.");
            return $this->redirect($this->generateUrl('website_contact_rdv').'#formulaire_rdv');
        }
        
        return $this->render('WebsiteBundle:Website:contact_rdv.html.twig', array('form' => $form->createView()));
    }
}
