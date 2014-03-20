<?php

namespace Brainstrap\CoreBundle\Entity\Session\Anonim;

use Brainstrap\CoreBundle\Entity\AbstractApiEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * AnonimSession
 *
 * @ORM\Table(name="core_sessions_anonim")
 * @ORM\Entity
 */
class AnonimSession extends AbstractApiEntity
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
     * Статус начала сессии
     * @ORM\ManyToOne(targetEntity="Brainstrap\CoreBundle\Entity\Session\Status\Start\SessionStatusStart")
     * @ORM\JoinColumn(name="status_start_id", referencedColumnName="id")
     */
    private $statusStart;

    /**
     * Статус окончания сессии
     * @ORM\ManyToOne(targetEntity="Brainstrap\CoreBundle\Entity\Session\Status\End\SessionStatusEnd")
     * @ORM\JoinColumn(name="status_end_id", referencedColumnName="id")
     */
    private $statusEnd;

    /**
     * @var string
     *
     * @ORM\Column(name="finished", type="datetime", nullable=true)
     */
    private $finished;

    /**
     * @ORM\ManyToMany(targetEntity="Brainstrap\CoreBundle\Entity\Session\Group\GroupSession", mappedBy="childs")
     */
    protected $parent;
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
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
     * Set statusStart
     *
     * @param \Brainstrap\CoreBundle\Entity\Session\Status\Start\SessionStatusStart $statusStart
     * @return AnonimSession
     */
    public function setStatusStart(\Brainstrap\CoreBundle\Entity\Session\Status\Start\SessionStatusStart $statusStart = null)
    {
        $this->statusStart = $statusStart;

        return $this;
    }

    /**
     * Get statusStart
     *
     * @return \Brainstrap\CoreBundle\Entity\Session\Status\Start\SessionStatusStart 
     */
    public function getStatusStart()
    {
        return $this->statusStart;
    }

    /**
     * Set statusEnd
     *
     * @param \Brainstrap\CoreBundle\Entity\Session\Status\End\SessionStatusEnd $statusEnd
     * @return AnonimSession
     */
    public function setStatusEnd(\Brainstrap\CoreBundle\Entity\Session\Status\End\SessionStatusEnd $statusEnd = null)
    {
        $this->statusEnd = $statusEnd;

        return $this;
    }

    /**
     * Get statusEnd
     *
     * @return \Brainstrap\CoreBundle\Entity\Session\Status\End\SessionStatusEnd 
     */
    public function getStatusEnd()
    {
        return $this->statusEnd;
    }

    /**
     * Add parent
     *
     * @param \Brainstrap\CoreBundle\Entity\Session\Group\GroupSession $parent
     * @return AnonimSession
     */
    public function addParent(\Brainstrap\CoreBundle\Entity\Session\Group\GroupSession $parent)
    {
        $this->parent[] = $parent;

        return $this;
    }

    /**
     * Remove parent
     *
     * @param \Brainstrap\CoreBundle\Entity\Session\Group\GroupSession $parent
     */
    public function removeParent(\Brainstrap\CoreBundle\Entity\Session\Group\GroupSession $parent)
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
