<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Advert
 *
 * @ORM\Table(name="advert")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\AdvertRepository")
 */
class Advert
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
     * @ORM\Column(name="title", type="string", length=255)
     * @Assert\Length(max=255, maxMessage="Le titre ne peut pas contenir plus de {{ limit }} caractères.")
     * @Assert\NotBlank()
     */
    private $title;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     * @Assert\Date(message="La date n'est pas valide.")
     * @Assert\NotBlank()
     */
    private $date;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEnd", type="date", nullable=true)
     * @Assert\Date(message="La date n'est pas valide.")
     */
    private $dateEnd;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="timeStart", type="time", nullable=true)
     * @Assert\Time(message="L'heure n'est pas valide.")
     */
    private $timeStart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="timeEnd", type="time", nullable=true)
     * @Assert\Time(message="L'heure n'est pas valide.")
     */
    private $timeEnd;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToOne(targetEntity="AdminBundle\Entity\Image", cascade={"persist", "remove"})
     * @Assert\Valid()
     */
    private $image;

    /**
     * @ORM\OneToOne(targetEntity="AdminBundle\Entity\Pdf", cascade={"persist", "remove"})
     * @Assert\Valid()
     */
    private $pdf;
    
    /**
     * @ORM\ManyToOne(targetEntity="AdminBundle\Entity\Address", cascade={"persist"})
     * @Assert\Valid()
     */
    private $address;
    
    /**
     * @ORM\OneToOne(targetEntity="AdminBundle\Entity\AddressOther", cascade={"persist", "remove"})
     * @Assert\Valid()
     */
    private $addressOther;

    /**
     * @var int
     *
     * @ORM\Column(name="price", type="integer", nullable=true)
     */
    private $price;

    /**
     * @var int
     *
     * @ORM\Column(name="priceOff", type="integer", nullable=true)
     */
    private $priceOff;
    
    /**
     * @ORM\ManyToOne(targetEntity="AdminBundle\Entity\Category", cascade={"persist"})
     * @Assert\Valid()
     * @Assert\NotBlank()
     */
    private $category;
    
    public function __construct() 
    {
        $this->date = new \Datetime();
        $this->timeStart = new \Datetime();
        $this->timeStart->setTime(10, 00);
        $this->timeEnd = new \Datetime();
        $this->timeEnd->setTime(13, 00);
        $this->price = "50";
        $this->priceOff = "45";
    }

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
     * Set title
     *
     * @param string $title
     *
     * @return Advert
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Advert
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set timeStart
     *
     * @param \DateTime $timeStart
     *
     * @return Advert
     */
    public function setTimeStart($timeStart)
    {
        $this->timeStart = $timeStart;

        return $this;
    }

    /**
     * Get timeStart
     *
     * @return \DateTime
     */
    public function getTimeStart()
    {
        return $this->timeStart;
    }

    /**
     * Set timeEnd
     *
     * @param \DateTime $timeEnd
     *
     * @return Advert
     */
    public function setTimeEnd($timeEnd)
    {
        $this->timeEnd = $timeEnd;

        return $this;
    }

    /**
     * Get timeEnd
     *
     * @return \DateTime
     */
    public function getTimeEnd()
    {
        return $this->timeEnd;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Advert
     */
    public function setDescription($description = null)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set image
     *
     * @param \stdClass $image
     *
     * @return Advert
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \stdClass
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set pdf
     *
     * @param \stdClass $pdf
     *
     * @return Advert
     */
    public function setPdf($pdf)
    {
        $this->pdf = $pdf;

        return $this;
    }

    /**
     * Get pdf
     *
     * @return \stdClass
     */
    public function getPdf()
    {
        return $this->pdf;
    }

    /**
     * Set price
     *
     * @param integer $price
     *
     * @return Advert
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set priceOff
     *
     * @param integer $priceOff
     *
     * @return Advert
     */
    public function setPriceOff($priceOff)
    {
        $this->priceOff = $priceOff;

        return $this;
    }

    /**
     * Get priceOff
     *
     * @return int
     */
    public function getPriceOff()
    {
        return $this->priceOff;
    }
    
    /**
     * Add address
     *
     * @param \AdminBundle\Entity\Address $address
     *
     * @return Advert
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAddress()
    {
        return $this->address;
    }
    

    /**
     * Set addressOther
     *
     * @param \AdminBundle\Entity\AddressOther $addressOther
     *
     * @return Advert
     */
    public function setAddressOther(\AdminBundle\Entity\AddressOther $addressOther = null)
    {
        $this->addressOther = $addressOther;

        return $this;
    }

    /**
     * Get addressOther
     *
     * @return \AdminBundle\Entity\AddressOther
     */
    public function getAddressOther()
    {
        return $this->addressOther;
    }

    /**
     * Set dateEnd
     *
     * @param \DateTime $dateEnd
     *
     * @return Advert
     */
    public function setDateEnd($dateEnd)
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    /**
     * Get dateEnd
     *
     * @return \DateTime
     */
    public function getDateEnd()
    {
        return $this->dateEnd;
    }

    /**
     * Set category
     *
     * @param \AdminBundle\Entity\Category $category
     *
     * @return Advert
     */
    public function setCategory(\AdminBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \AdminBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }
}
