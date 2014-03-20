<?php

namespace Brainstrap\CoreBundle\Controller\Session\Group;

use Brainstrap\CoreBundle\Controller\Session\AbstractSessionController;

use FOS\RestBundle\Controller\Annotations as Rest,
    FOS\RestBundle\Controller\Annotations\RouteResource;

use Brainstrap\CoreBundle\Entity\Session\Group\GroupSession,
    Brainstrap\CoreBundle\Form\Session\Group\GroupSessionType;

/**
 * @RouteResource("session/group")
 */
class GroupSessionController extends AbstractSessionController
{
    public function __construct()
    {
        $this->repository = "BrainstrapCoreBundle:Session\Group\GroupSession";
        $this->form = new GroupSessionType();
        $this->entity = new GroupSession();
    }
}
