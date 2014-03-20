<?php
/**
 * Created by PhpStorm.
 * User: karmis
 * Date: 19.03.14
 * Time: 2:55
 */

namespace Brainstrap\CoreBundle\Entity;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class AbstractApiEntity
 * @package Brainstrap\CoreBundle\Entity
 * @ORM\MappedSuperclass
 */
class AbstractApiEntity {

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
     * @var boolean
     *
     * @ORM\Column(name="inactive", type="boolean")
     * @Assert\NotNull(message = "{inactive:'empty'}")
     */
    private $inactive;

    public function __construct()
    {
        $this->setInactive(false);
    }

    /**
     * @param $inactive
     * @return $this
     */
    public function setInactive($inactive)
    {
        $this->inactive = $inactive;

        return $this;
    }

    /**
     * @return bool
     */
    public function getInactive()
    {
        return $this->inactive;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
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
}
