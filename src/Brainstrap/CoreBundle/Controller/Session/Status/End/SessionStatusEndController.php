<?php

namespace Brainstrap\CoreBundle\Controller\Session\Status\End;

use Brainstrap\CoreBundle\Controller\AbstractApiController;

use FOS\RestBundle\Controller\Annotations as Rest,
    FOS\RestBundle\Controller\Annotations\RouteResource;

use Brainstrap\CoreBundle\Entity\Session\Status\End\SessionStatusEnd,
    Brainstrap\CoreBundle\Form\Session\Status\End\SessionStatusEndType,
    Brainstrap\CoreBundle\Exception\ValidateHttpException;

/**
 * @RouteResource("session/status/end")
 */
class SessionStatusEndController extends AbstractApiController
{
    public function __construct()
    {
        $this->form = new SessionStatusEndType();
        $this->entity = new SessionStatusEnd();
        $this->repository = "BrainstrapCoreBundle:Session\Status\End\SessionStatusEnd";
    }
}
