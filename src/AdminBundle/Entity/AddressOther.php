<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * AddressOther
 *
 * @ORM\Table(name="AddressOther")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\AddressOtherRepository")
 */
class AddressOther
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=255)
     * @Assert\Length(max=255, maxMessage="Le titre ne peut pas contenir plus de {{ limit }} caractères.")
     * @Assert\NotBlank()
     */
    private $street;

    /**
     * @var string
     *
     * @ORM\Column(name="postalCode", type="string", length=255)
     * @Assert\Length(max=255, maxMessage="Le code postal ne peut pas contenir plus de {{ limit }} caractères.")
     * @Assert\NotBlank()
     */
    private $postalCode;

    /**
     * @var string
     *
     * @ORM\Column(name="town", type="string", length=255)
     * @Assert\Length(max=255, maxMessage="La ville ne peut pas contenir plus de {{ limit }} caractères.")
     * @Assert\NotBlank()
     */
    private $town;

    /**
     * @var string
     *
     * @ORM\Column(name="mapLink", type="text", nullable=true)
     */
    private $mapLink;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set street
     *
     * @param string $street
     *
     * @return AddressOther
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set postalCode
     *
     * @param string $postalCode
     *
     * @return AddressOther
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Get postalCode
     *
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set town
     *
     * @param string $town
     *
     * @return AddressOther
     */
    public function setTown($town)
    {
        $this->town = $town;

        return $this;
    }

    /**
     * Get town
     *
     * @return string
     */
    public function getTown()
    {
        return $this->town;
    }

    /**
     * Set mapLink
     *
     * @param string $mapLink
     *
     * @return AddressOther
     */
    public function setMapLink($mapLink)
    {
        $this->mapLink = $mapLink;

        return $this;
    }

    /**
     * Get mapLink
     *
     * @return string
     */
    public function getMapLink()
    {
        return $this->mapLink;
    }
}

