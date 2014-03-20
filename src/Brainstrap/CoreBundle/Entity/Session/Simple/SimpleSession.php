<?php

namespace Brainstrap\CoreBundle\Entity\Session\Simple;

use Brainstrap\CoreBundle\Entity\AbstractApiEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert,
    Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Simple Session
 *
 * @ORM\Table(name="core_sessions_simple")
 * @ORM\Entity(repositoryClass="Brainstrap\CoreBundle\Repository\Session\Simple\SimpleSessionRepository")
 * @UniqueEntity(
 *     fields={"cart"},
 *     errorPath="cart",
 *     message="Для этой карты уже существует сессия"
 * )
 */
class SimpleSession extends AbstractApiEntity
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
     * @ORM\ManyToOne(targetEntity="Brainstrap\CoreBundle\Entity\Company\Company")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     * @Assert\NotNull(message = "{company:'empty'}")
     */
    private $company;

    /**
     * @ORM\OneToOne(targetEntity="Brainstrap\CoreBundle\Entity\Cart\Cart")
     * @ORM\JoinColumn(name="cart_id", referencedColumnName="id")
     * @Assert\NotNull(message = "{cart:'empty'}")
     */
    private $cart;

    /**
     * @ORM\ManyToOne(targetEntity="Brainstrap\CoreBundle\Entity\Rate\Time\EntityTime")
     * @ORM\JoinColumn(name="rate_time_id", referencedColumnName="id")
     * @Assert\NotNull(message = "{rate:'empty'}")
     */
    private $rate;

    /**
     * Статус начала сессии
     * @ORM\ManyToOne(targetEntity="Brainstrap\CoreBundle\Entity\Session\Status\Start\SessionStatusStart")
     * @ORM\JoinColumn(name="status_start_id", referencedColumnName="id")
     * @Assert\NotNull(message = "{statusStart:'empty'}")
     */
    private $statusStart;

    /**
     * Статус окончания сессии
     * @ORM\ManyToOne(targetEntity="Brainstrap\CoreBundle\Entity\Session\Status\End\SessionStatusEnd")
     * @ORM\JoinColumn(name="status_end_id", referencedColumnName="id")
     */
    private $statusEnd;

    /**
     * Событие
     * @ORM\ManyToOne(targetEntity="Brainstrap\CoreBundle\Entity\Event\Event")
     * @ORM\JoinColumn(name="event_id", referencedColumnName="id")
     */
    private $event;

    /**
     * @var string
     *
     * @ORM\Column(name="finished", type="datetime", nullable=true)
     */
    private $finished;

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
     * Set finished
     *
     * @param \DateTime $finished
     * @return SimpleSession
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
     * Set company
     *
     * @param \Brainstrap\CoreBundle\Entity\Company\Company $company
     * @return SimpleSession
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
     * Set cart
     *
     * @param \Brainstrap\CoreBundle\Entity\Cart\Cart $cart
     * @return SimpleSession
     */
    public function setCart(\Brainstrap\CoreBundle\Entity\Cart\Cart $cart = null)
    {
        $this->cart = $cart;

        return $this;
    }

    /**
     * Get cart
     *
     * @return \Brainstrap\CoreBundle\Entity\Cart\Cart 
     */
    public function getCart()
    {
        return $this->cart;
    }

    /**
     * Set rate
     *
     * @param \Brainstrap\CoreBundle\Entity\Rate\Time\EntityTime $rate
     * @return SimpleSession
     */
    public function setRate(\Brainstrap\CoreBundle\Entity\Rate\Time\EntityTime $rate = null)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get rate
     *
     * @return \Brainstrap\CoreBundle\Entity\Rate\Time\EntityTime 
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set statusStart
     *
     * @param \Brainstrap\CoreBundle\Entity\Session\Status\Start\SessionStatusStart $statusStart
     * @return SimpleSession
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
     * @return SimpleSession
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
     * Set event
     *
     * @param \Brainstrap\CoreBundle\Entity\Event\Event $event
     * @return SimpleSession
     */
    public function setEvent(\Brainstrap\CoreBundle\Entity\Event\Event $event = null)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return \Brainstrap\CoreBundle\Entity\Event\Event 
     */
    public function getEvent()
    {
        return $this->event;
    }
}
