<?php

namespace Brainstrap\CoreBundle\Entity\Cart;

use Brainstrap\CoreBundle\Entity\AbstractApiEntity;
use Gedmo\Mapping\Annotation as Gedmo;
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
class Cart extends AbstractApiEntity
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
     * @ORM\Column(name="code", type="string", length=100, unique=true)
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
     * @ORM\Column(name="type", type="string", length=20)
     * @Assert\NotBlank(message = "{type:'empty'}")
     * @Assert\NotNull(message = "{type:'empty'}")
     */
    private $type;

    /**
     * @ORM\ManyToMany(targetEntity="Brainstrap\CoreBundle\Entity\Client\Client", mappedBy="carts")
     */
    protected $client;

    public function __toString()
    {
        return $this->code;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->client = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add client
     *
     * @param \Brainstrap\CoreBundle\Entity\Client\Client $client
     * @return Cart
     */
    public function addClient(\Brainstrap\CoreBundle\Entity\Client\Client $client)
    {
        $this->client[] = $client;

        return $this;
    }

    /**
     * Remove client
     *
     * @param \Brainstrap\CoreBundle\Entity\Client\Client $client
     */
    public function removeClient(\Brainstrap\CoreBundle\Entity\Client\Client $client)
    {
        $this->client->removeElement($client);
    }

    /**
     * Get client
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getClient()
    {
        return $this->client;
    }
}
