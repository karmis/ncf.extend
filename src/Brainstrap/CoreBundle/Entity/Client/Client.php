<?php

namespace Brainstrap\CoreBundle\Entity\Client;

use Brainstrap\CoreBundle\Entity\AbstractApiEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Client
 *
 * @ORM\Table(name="core_clients")
 * @ORM\Entity(repositoryClass="Brainstrap\CoreBundle\Repository\Client\ClientRepository")
 */
class Client extends AbstractApiEntity
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
     * @Assert\NotBlank(message = "{name:'empty'}")
     * @Assert\NotNull(message = "{name:'empty'}")
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="sname", type="string", length=100)
     * @Assert\NotBlank(message = "{sname:'empty'}")
     * @Assert\NotNull(message = "{sname:'empty'}")
     */
    private $sname;

    /**
     * @ORM\ManyToMany(targetEntity="Brainstrap\CoreBundle\Entity\Cart\Cart", inversedBy="clients", cascade={"all"})
     * @ORM\JoinTable(name="core_clients_carts")
     */
    protected $carts;
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->carts = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add carts
     *
     * @param \Brainstrap\CoreBundle\Entity\Cart\Cart $carts
     * @return Client
     */
    public function addCart(\Brainstrap\CoreBundle\Entity\Cart\Cart $carts)
    {
        $this->carts[] = $carts;

        return $this;
    }

    /**
     * Remove carts
     *
     * @param \Brainstrap\CoreBundle\Entity\Cart\Cart $carts
     */
    public function removeCart(\Brainstrap\CoreBundle\Entity\Cart\Cart $carts)
    {
        $this->carts->removeElement($carts);
    }

    /**
     * Get carts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCarts()
    {
        return $this->carts;
    }
}
