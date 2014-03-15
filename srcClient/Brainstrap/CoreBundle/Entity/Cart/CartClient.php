<?php

namespace Brainstrap\CoreBundle\Entity\Cart;

use Doctrine\ORM\Mapping as ORM;

/**
 * CartClient
 */
class CartClient
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Brainstrap\CoreBundle\Entity\Client\Client
     */
    private $client;

    /**
     * @var \Brainstrap\CoreBundle\Entity\Cart\Cart
     */
    private $cart;


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
     * Set client
     *
     * @param \Brainstrap\CoreBundle\Entity\Client\Client $client
     * @return CartClient
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

    /**
     * Set cart
     *
     * @param \Brainstrap\CoreBundle\Entity\Cart\Cart $cart
     * @return CartClient
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
}
