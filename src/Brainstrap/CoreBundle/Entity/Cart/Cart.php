<?php

namespace Brainstrap\CoreBundle\Entity\Cart;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert,
    Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Cart
 *
 * @ORM\Table(name="core_carts")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Brainstrap\CoreBundle\Repository\Cart\CartRepository")
 * @UniqueEntity(
 *     fields={"code"},
 *     errorPath="code",
 *     message="Карта с таким кодом уже существует"
 * )
 */
class Cart
{
    const CART_TYPE_SINGLE = 'single';
    const CART_TYPE_GROUP = 'group';
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
     * @ORM\Column(name="code", type="string", length=100)
     * @Assert\NotBlank(message = "{code:'empty'}")
     * @Assert\NotNull(message = "{code:'empty'}")
     */
    private $code;

    /**
     * @ORM\ManyToOne(targetEntity="Brainstrap\CoreBundle\Entity\Company\Company")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     */
    private $company;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=50)
     */
    private $type;

    /**
     * @ORM\OneToOne(targetEntity="Brainstrap\CoreBundle\Entity\Client\Client")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     */
    private $client;

    /**
     * @var boolean
     *
     * @ORM\Column(name="locked", type="boolean")
     * @Assert\NotBlank(message = "{locked:'empty'}")
     * @Assert\NotNull(message = "{locked:'empty'}")
     */
    private $locked;

    public function getEntityName()
    {
        return "cart";
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
     * Set code
     *
     * @param string $code
     * @return Cart
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Cart
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set locked
     *
     * @param boolean $locked
     * @return Cart
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
     * Set company
     *
     * @param \Brainstrap\CoreBundle\Entity\Company\Company $company
     * @return Cart
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
     * Set client
     *
     * @param \Brainstrap\CoreBundle\Entity\Client\Client $client
     * @return Cart
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
