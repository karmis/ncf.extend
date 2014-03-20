<?php

namespace Brainstrap\CoreBundle\Controller\Company;

use Brainstrap\CoreBundle\Controller\AbstractApiController;

use FOS\RestBundle\Controller\Annotations as Rest,
    FOS\RestBundle\Controller\Annotations\RouteResource;

use Brainstrap\CoreBundle\Entity\Company\Company,
    Brainstrap\CoreBundle\Form\Company\CompanyType,
    Brainstrap\CoreBundle\Exception\ValidateHttpException;
/**
 * @RouteResource("company")
 */
class CompanyController extends AbstractApiController
{
    public function __construct()
    {
        $this->form = new CompanyType();
        $this->entity = new Company();
        $this->repository = "BrainstrapCoreBundle:Company\Company";
    }
}
