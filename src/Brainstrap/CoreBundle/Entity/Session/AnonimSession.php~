<?php

namespace Brainstrap\CoreBundle\Entity\Session;

use Doctrine\ORM\Mapping as ORM;

/**
 * AnonimSession
 *
 * @ORM\Table(name="sessions_anonim")
 * @ORM\Entity
 */
class AnonimSession
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
     * @var \DateTime
     *
     * @ORM\Column(name="starDate", type="datetime")
     */
    private $starDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endDate", type="datetime")
     */
    private $endDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="editDate", type="datetime")
     */
    private $editDate;

    /**
     * @ORM\OneToOne(targetEntity="Brainstrap\CoreBundle\Entity\Session\GroupSession")
     * @ORM\JoinColumn(name="group_id", referencedColumnName="id")
     */
    private $group;

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
     * Set starDate
     *
     * @param \DateTime $starDate
     * @return AnonimSession
     */
    public function setStarDate($starDate)
    {
        $this->starDate = $starDate;

        return $this;
    }

    /**
     * Get starDate
     *
     * @return \DateTime 
     */
    public function getStarDate()
    {
        return $this->starDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     * @return AnonimSession
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime 
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set editDate
     *
     * @param \DateTime $editDate
     * @return AnonimSession
     */
    public function setEditDate($editDate)
    {
        $this->editDate = $editDate;

        return $this;
    }

    /**
     * Get editDate
     *
     * @return \DateTime 
     */
    public function getEditDate()
    {
        return $this->editDate;
    }

    /**
     * Set group
     *
     * @param \Brainstrap\CoreBundle\Entity\Session\GroupSession $group
     * @return AnonimSession
     */
    public function setGroup(\Brainstrap\CoreBundle\Entity\Session\GroupSession $group = null)
    {
        $this->group = $group;

        return $this;
    }

    /**
     * Get group
     *
     * @return \Brainstrap\CoreBundle\Entity\Session\GroupSession 
     */
    public function getGroup()
    {
        return $this->group;
    }
}
