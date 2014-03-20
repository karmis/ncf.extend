<?php

namespace Brainstrap\CoreBundle\Controller\Session\Status\Start;

use Brainstrap\CoreBundle\Controller\AbstractApiController;

use FOS\RestBundle\Controller\Annotations as Rest,
    FOS\RestBundle\Controller\Annotations\RouteResource;

use  Brainstrap\CoreBundle\Entity\Session\Status\Start\SessionStatusStart,
    Brainstrap\CoreBundle\Form\Session\Status\Start\SessionStatusStartType,
    Brainstrap\CoreBundle\Exception\ValidateHttpException;

/**
 * @RouteResource("session/status/start")
 */
class SessionStatusStartController extends AbstractApiController
{
    public function __construct()
    {
        $this->form = new SessionStatusStartType();
        $this->entity = new SessionStatusStart();
        $this->repository = "BrainstrapCoreBundle:Session\Status\Start\SessionStatusStart";
    }
}
