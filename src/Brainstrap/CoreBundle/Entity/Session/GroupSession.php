<?php

namespace Brainstrap\CoreBundle\Entity\Session;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert,
    Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Simple Session
 *
 * @ORM\Table(name="core_sessions_group")
 * @ORM\Entity(repositoryClass="Brainstrap\CoreBundle\Repository\Session\GroupSessionRepository")
 * @UniqueEntity(
 *     fields={"cart"},
 *     errorPath="cart",
 *     message="Для этой карты уже существует сессия"
 * )
 */
class GroupSession
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
     */
    private $company;

    /**
     * @ORM\ManyToOne(targetEntity="Brainstrap\CoreBundle\Entity\Session\SessionStatus")
     * @ORM\JoinColumn(name="status_complete_id", referencedColumnName="id")
     */
    private $status;

    /**
     * @ORM\ManyToMany(targetEntity="Brainstrap\CoreBundle\Entity\Session\AnonimSession", inversedBy="parent", cascade={"all"})
     * @ORM\JoinTable(name="core_sessions_group_childs_anonim")
     */
    protected $childs;

    /**
     * @var string
     *
     * @ORM\Column(name="finished", type="datetime", nullable=true)
     */
    private $finished;

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
     * Constructor
     */
    public function __construct()
    {
        $this->childs = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return GroupSession
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
     * Set created
     *
     * @param \DateTime $created
     * @return GroupSession
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
     * @return GroupSession
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
     * Set company
     *
     * @param \Brainstrap\CoreBundle\Entity\Company\Company $company
     * @return GroupSession
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
     * Set status
     *
     * @param \Brainstrap\CoreBundle\Entity\Session\SessionStatus $status
     * @return GroupSession
     */
    public function setStatus(\Brainstrap\CoreBundle\Entity\Session\SessionStatus $status = null)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return \Brainstrap\CoreBundle\Entity\Session\SessionStatus 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Add childs
     *
     * @param \Brainstrap\CoreBundle\Entity\Session\AnonimSession $childs
     * @return GroupSession
     */
    public function addChild(\Brainstrap\CoreBundle\Entity\Session\AnonimSession $childs)
    {
        $this->childs[] = $childs;

        return $this;
    }

    /**
     * Remove childs
     *
     * @param \Brainstrap\CoreBundle\Entity\Session\AnonimSession $childs
     */
    public function removeChild(\Brainstrap\CoreBundle\Entity\Session\AnonimSession $childs)
    {
        $this->childs->removeElement($childs);
    }

    /**
     * Get childs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChilds()
    {
        return $this->childs;
    }
}
