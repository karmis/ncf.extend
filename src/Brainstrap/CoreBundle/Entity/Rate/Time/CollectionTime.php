<?php

namespace Brainstrap\CoreBundle\Entity\Rate\Time;

use Brainstrap\CoreBundle\Entity\AbstractApiEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * CollectionTime
 *
 * @ORM\Table(name="core_rate_time_collection")
 * @ORM\Entity
 */
class CollectionTime extends AbstractApiEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="hour", type="decimal", scale=2)
     */
    private $hour;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", scale=2)
     */
    private $price;

    public function __toString(){
        return (string)$this->hour;
    }

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set hour
     *
     * @param string $hour
     * @return CollectionTime
     */
    public function setHour($hour)
    {
        $this->hour = $hour;

        return $this;
    }

    /**
     * Get hour
     *
     * @return string 
     */
    public function getHour()
    {
        return $this->hour;
    }

    /**
     * Set price
     *
     * @param string $price
     * @return CollectionTime
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string 
     */
    public function getPrice()
    {
        return $this->price;
    }
}
