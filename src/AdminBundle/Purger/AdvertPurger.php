<?php

namespace AdminBundle\Purger;

use Doctrine\ORM\EntityManagerInterface;

class AdvertPurger
{  
    /**
     * @var EntityManagerInterface
     */
    private $em;
    
    public function __construct(EntityManagerInterface $em) 
    {
        $this->em = $em;
    }
    
    public function purge($days) 
    {
        // Date d'il y a $days jours
        $date = new \Datetime($days.' days ago');
        
        // On récupère les annonces à supprimer
        $listAdverts = $this->em->getRepository('AdminBundle:Advert')->getAdvertsOlderThan($date);
        
        if (!empty($listAdverts)) {
            foreach ($listAdverts as $advert) {
                $this->em->remove($advert);
            }

            $this->em->flush(); 
        }        
    }
}