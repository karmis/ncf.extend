<?php

namespace Brainstrap\CoreBundle\Entity\Cart;

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
class Cart
{
    const CART_TYPE_SINGLE = 'single';
    const CART_TYPE_GROUP = 'group';
    const CART_BUSY_STATUS_FREE = 'free';
    const CART_BUSY_STATUS_BUSY = 'busy';
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
     * @ORM\ManyToOne(targetEntity="Brainstrap\CoreBundle\Entity\Company\Company")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     */
    private $company;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=20)
     * @Assert\NotBlank(message = "{locked:'empty'}")
     * @Assert\NotNull(message = "{locked:'empty'}")
     */
    private $type;

    /**
     * @var boolean
     *
     * @ORM\Column(name="locked", type="boolean")
     * @Assert\NotNull(message = "{locked:'empty'}")
     */
    private $locked;

    /**
     * @var string
     *
     * @ORM\Column(name="status_busy", type="string", length=10)
     * @Assert\NotBlank(message = "{locked:'empty'}")
     * @Assert\NotNull(message = "{locked:'empty'}")
     */
    private $statusBusy;

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
        $this->client = new \Doctrine\Common\Collections\ArrayCollection();
        $this->statusBusy = $this::CART_BUSY_STATUS_FREE;
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
     * Set created
     *
     * @param \DateTime $created
     * @return Cart
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
     * @return Cart
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
     * Set statusBusy
     *
     * @param string $statusBusy
     * @return Cart
     */
    public function setStatusBusy($statusBusy)
    {
        $this->statusBusy = $statusBusy;

        return $this;
    }

    /**
     * Get statusBusy
     *
     * @return string 
     */
    public function getStatusBusy()
    {
        return $this->statusBusy;
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
