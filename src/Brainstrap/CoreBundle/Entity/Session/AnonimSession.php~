<?php

namespace Brainstrap\CoreBundle\Entity\Session;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
/**
 * AnonimSession
 *
 * @ORM\Table(name="core_sessions_anonim")
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
     * @ORM\ManyToOne(targetEntity="Brainstrap\CoreBundle\Entity\Session\SessionStatus")
     * @ORM\JoinColumn(name="status_complete_id", referencedColumnName="id")
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="finished", type="datetime", nullable=true)
     */
    private $finished;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * @ORM\Column(name="updated", type="datetime")
     * @Gedmo\Timestampable(on="update")
     */
    private $updated;

    /**
     * @ORM\ManyToMany(targetEntity="Brainstrap\CoreBundle\Entity\Session\GroupSession", mappedBy="childs")
     */
    protected $parent;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->parent = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set finished
     *
     * @param \DateTime $finished
     * @return AnonimSession
     */
    public function setFinished($finished)
    {
        $this->finished = $finished;

        return $this;
    }

    /**
     * Get finished
     *
     * @return \DateTime 
     */
    public function getFinished()
    {
        return $this->finished;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return AnonimSession
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return AnonimSession
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set status
     *
     * @param \Brainstrap\CoreBundle\Entity\Session\SessionStatus $status
     * @return AnonimSession
     */
    public function setStatus(\Brainstrap\CoreBundle\Entity\Session\SessionStatus $status = null)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return \Brainstrap\CoreBundle\Entity\Session\SessionStatus 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Add parent
     *
     * @param \Brainstrap\CoreBundle\Entity\Session\GroupSession $parent
     * @return AnonimSession
     */
    public function addParent(\Brainstrap\CoreBundle\Entity\Session\GroupSession $parent)
    {
        $this->parent[] = $parent;

        return $this;
    }

    /**
     * Remove parent
     *
     * @param \Brainstrap\CoreBundle\Entity\Session\GroupSession $parent
     */
    public function removeParent(\Brainstrap\CoreBundle\Entity\Session\GroupSession $parent)
    {
        $this->parent->removeElement($parent);
    }

    /**
     * Get parent
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getParent()
    {
        return $this->parent;
    }
}
