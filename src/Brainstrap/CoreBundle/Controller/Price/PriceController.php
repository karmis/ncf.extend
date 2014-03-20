<?php

namespace Brainstrap\CoreBundle\Controller\Price;

use Brainstrap\CoreBundle\Controller\AbstractApiController;

use FOS\RestBundle\Controller\Annotations as Rest,
    FOS\RestBundle\Controller\Annotations\RouteResource;

use Brainstrap\CoreBundle\Exception\ValidateHttpException;
/**
 * @RouteResource("price")
 */
class PriceController extends AbstractApiController
{
    public function __construct()
    {
        $this->form = null;
        $this->entity = null;
        $this->repository = null;
    }

//    public function cgetCompanyAction($companyId)
//    {
//        die("Ololololololo");
//    }
}
