<?php

namespace Brainstrap\CoreBundle\Controller\Session\Simple;

use Brainstrap\CoreBundle\Controller\Session\AbstractSessionController;

use FOS\RestBundle\Controller\Annotations as Rest,
    FOS\RestBundle\Controller\Annotations\RouteResource;

use Brainstrap\CoreBundle\Entity\Session\Simple\SimpleSession,
    Brainstrap\CoreBundle\Form\Session\Simple\SimpleSessionType;

/**
 * @RouteResource("session/simple")
 */
class SimpleSessionController extends AbstractSessionController
{
    public function __construct()
    {
        $this->repository = "BrainstrapCoreBundle:Session\Simple\SimpleSession";
        $this->form = new SimpleSessionType();
        $this->entity = new SimpleSession();
    }
}
