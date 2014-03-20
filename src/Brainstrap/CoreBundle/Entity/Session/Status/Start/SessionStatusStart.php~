<?php

namespace Brainstrap\CoreBundle\Entity\Session\Status\Start;

use Brainstrap\CoreBundle\Entity\AbstractApiEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * SessionStatusStart
 *
 * @ORM\Table(name="core_session_status_start")
 * @ORM\Entity(repositoryClass="Brainstrap\CoreBundle\Repository\Session\Status\Start\SessionStatusStartRepository")
 */
class SessionStatusStart extends AbstractApiEntity
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
     * AbstractApiEntity
     * @var string
     *
     * @ORM\Column(name="caption", type="string", length=255)
     */
    private $caption;

    /**
     * @ORM\ManyToOne(targetEntity="Brainstrap\CoreBundle\Entity\Company\Company")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     */
    private $company;

    public function __toString(){
        return $this->caption;
    }

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
     * Set company
     *
     * @param \Brainstrap\CoreBundle\Entity\Company\Company $company
     * @return SessionStatusStart
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
     * Set caption
     *
     * @param string $caption
     * @return SessionStatusStart
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;

        return $this;
    }

    /**
     * Get caption
     *
     * @return string 
     */
    public function getCaption()
    {
        return $this->caption;
    }
}
