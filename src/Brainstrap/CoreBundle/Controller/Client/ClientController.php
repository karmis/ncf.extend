<?php

namespace Brainstrap\CoreBundle\Controller\Client;

use Brainstrap\CoreBundle\Controller\AbstractApiController;

use FOS\RestBundle\Controller\FOSRestController,
    FOS\RestBundle\Controller\Annotations as Rest,
    FOS\RestBundle\Controller\Annotations\RouteResource;

use Brainstrap\CoreBundle\Entity\Client\Client,
    Brainstrap\CoreBundle\Form\Client\ClientType,
    Brainstrap\CoreBundle\Exception\ValidateHttpException;

/**
 * @RouteResource("client")
 */
class ClientController extends AbstractApiController
{
    public function __construct()
    {
        $this->form = new ClientType();
        $this->entity = new Client();
        $this->repository = "BrainstrapCoreBundle:Client\Client";
    }
}
