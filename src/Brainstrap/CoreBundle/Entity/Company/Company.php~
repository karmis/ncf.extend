<?php
namespace Brainstrap\CoreBundle\Entity\Company;

use Brainstrap\CoreBundle\Entity\AbstractApiEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Company
 *
 * @ORM\Table(name="core_companies")
 * @ORM\Entity(repositoryClass="Brainstrap\CoreBundle\Repository\Company\CompanyRepository")
 */
class Company extends AbstractApiEntity
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
     * @ORM\Column(name="caption", type="string", length=100)
     * @Assert\NotBlank(message = "{caption:'empty'}")
     * @Assert\NotNull(message = "{caption:'empty'}")
     */
    private $caption;

    /**
     * Get company
     * Небольшой хак, для проверки принадлежности карты компании
     * @return Company
     */
    public function getCompany()
    {
        return $this;
    }

    public function __toString()
    {
        return $this->caption;
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
     * Set caption
     *
     * @param string $caption
     * @return Company
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
