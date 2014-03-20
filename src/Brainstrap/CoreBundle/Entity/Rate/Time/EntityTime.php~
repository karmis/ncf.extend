<?php

namespace Brainstrap\CoreBundle\Entity\Rate\Time;

use Brainstrap\CoreBundle\Entity\AbstractApiEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * EntityTime
 *
 * @ORM\Table(name="core_rate_time_entity")
 * @ORM\Entity
 */
class EntityTime extends AbstractApiEntity
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
     * @ORM\Column(name="caption", type="string", length=255)
     */
    private $caption;

    /**
     * @var string
     *
     * @ORM\Column(name="last", type="integer")
     */
    private $last;

    /**
     * @var string
     *
     * @ORM\Column(name="afterLast", type="decimal", scale=2)
     */
    private $afterLast;

    /**
     * @ORM\ManyToOne(targetEntity="Brainstrap\CoreBundle\Entity\Company\Company")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     */
    private $company;
    
    /**
     * @ORM\ManyToMany(targetEntity="Brainstrap\CoreBundle\Entity\Rate\Time\CollectionTime", cascade={"all"})
     * @ORM\JoinTable(name="core_rate_time_hours")
     */
    protected $hours;

    public function __toString(){
        return $this->caption;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->hours = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set caption
     *
     * @param string $caption
     * @return EntityTime
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;

        return $this;
    }

    /**
     * Get caption
     *
     * @return string 
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * Set last
     *
     * @param integer $last
     * @return EntityTime
     */
    public function setLast($last)
    {
        $this->last = $last;

        return $this;
    }

    /**
     * Get last
     *
     * @return integer 
     */
    public function getLast()
    {
        return $this->last;
    }

    /**
     * Set afterLast
     *
     * @param string $afterLast
     * @return EntityTime
     */
    public function setAfterLast($afterLast)
    {
        $this->afterLast = $afterLast;

        return $this;
    }

    /**
     * Get afterLast
     *
     * @return string 
     */
    public function getAfterLast()
    {
        return $this->afterLast;
    }

    /**
     * Set company
     *
     * @param \Brainstrap\CoreBundle\Entity\Company\Company $company
     * @return EntityTime
     */
    public function setCompany(\Brainstrap\CoreBundle\Entity\Company\Company $company = null)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \Brainstrap\CoreBundle\Entity\Company\Company 
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Add hours
     *
     * @param \Brainstrap\CoreBundle\Entity\Rate\Time\CollectionTime $hours
     * @return EntityTime
     */
    public function addHour(\Brainstrap\CoreBundle\Entity\Rate\Time\CollectionTime $hours)
    {
        $this->hours[] = $hours;

        return $this;
    }

    /**
     * Remove hours
     *
     * @param \Brainstrap\CoreBundle\Entity\Rate\Time\CollectionTime $hours
     */
    public function removeHour(\Brainstrap\CoreBundle\Entity\Rate\Time\CollectionTime $hours)
    {
        $this->hours->removeElement($hours);
    }

    /**
     * Get hours
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getHours()
    {
        return $this->hours;
    }
}
