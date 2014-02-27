<?php

namespace Brainstrap\CoreBundle\Entity\Session;

use Doctrine\ORM\Mapping as ORM;

/**
 * Simple Session
 *
 * @ORM\Table(name="core_sessions_simple")
 * @ORM\Entity(repositoryClass="Brainstrap\CoreBundle\Repository\Session\SimpleSessionRepository")
 */
class SimpleSession
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
     * @ORM\OneToOne(targetEntity="Brainstrap\CoreBundle\Entity\Cart\Cart")
     * @ORM\JoinColumn(name="cart_id", referencedColumnName="id")
     */
    private $cart;

    /**
     * @ORM\OneToOne(targetEntity="Brainstrap\CoreBundle\Entity\Client\Client")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     */
    private $client;

    /**
     * @var string
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     * @return SimpleSession
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
     * @return SimpleSession
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
     * Set client
     *
     * @param \Brainstrap\CoreBundle\Entity\Client\Client $client
     * @return SimpleSession
     */
    public function setClient(\Brainstrap\CoreBundle\Entity\Client\Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \Brainstrap\CoreBundle\Entity\Client\Client 
     */
    public function getClient()
    {
        return $this->client;
    }
}
