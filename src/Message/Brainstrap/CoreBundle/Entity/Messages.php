<?php

namespace Brainstrap\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Messages
 */
class Messages
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $fromId;

    /**
     * @var string
     */
    private $toId;

    /**
     * @var string
     */
    private $message;


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
     * Set fromId
     *
     * @param string $fromId
     * @return Messages
     */
    public function setFromId($fromId)
    {
        $this->fromId = $fromId;

        return $this;
    }

    /**
     * Get fromId
     *
     * @return string 
     */
    public function getFromId()
    {
        return $this->fromId;
    }

    /**
     * Set toId
     *
     * @param string $toId
     * @return Messages
     */
    public function setToId($toId)
    {
        $this->toId = $toId;

        return $this;
    }

    /**
     * Get toId
     *
     * @return string 
     */
    public function getToId()
    {
        return $this->toId;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return Messages
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }
}
