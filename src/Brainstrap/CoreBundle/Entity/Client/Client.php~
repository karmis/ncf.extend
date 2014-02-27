<?php

namespace Brainstrap\CoreBundle\Entity\Client;

use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Table(name="core_clients")
 * @ORM\Entity(repositoryClass="Brainstrap\CoreBundle\Repository\Client\ClientRepository")
 */
class Client
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
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="sname", type="string", length=100)
     */
    private $sname;

    /**
     * @ORM\ManyToOne(targetEntity="Brainstrap\CoreBundle\Entity\Cart\Cart")
     * @ORM\JoinColumn(name="cart_id", referencedColumnName="id")
     */
    private $carts;

    /**
     * @var string
     *
     * @ORM\Column(name="locked", type="boolean")
     */
    private $locked;

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
     * Set name
     *
     * @param string $name
     * @return Client
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set sname
     *
     * @param string $sname
     * @return Client
     */
    public function setSname($sname)
    {
        $this->sname = $sname;

        return $this;
    }

    /**
     * Get sname
     *
     * @return string 
     */
    public function getSname()
    {
        return $this->sname;
    }

    /**
     * Set locked
     *
     * @param boolean $locked
     * @return Client
     */
    public function setLocked($locked)
    {
        $this->locked = $locked;

        return $this;
    }

    /**
     * Get locked
     *
     * @return boolean 
     */
    public function getLocked()
    {
        return $this->locked;
    }

    /**
     * Set carts
     *
     * @param \Brainstrap\CoreBundle\Entity\Cart\Cart $carts
     * @return Client
     */
    public function setCarts(\Brainstrap\CoreBundle\Entity\Cart\Cart $carts = null)
    {
        $this->carts = $carts;

        return $this;
    }

    /**
     * Get carts
     *
     * @return \Brainstrap\CoreBundle\Entity\Cart\Cart 
     */
    public function getCarts()
    {
        return $this->carts;
    }
}
