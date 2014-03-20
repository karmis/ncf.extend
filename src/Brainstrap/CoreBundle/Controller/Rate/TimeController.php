<?php
/**
 * Created by PhpStorm.
 * User: karmis
 * Date: 15.03.14
 * Time: 21:05
 */

namespace Brainstrap\CoreBundle\Controller\Rate;

use Brainstrap\CoreBundle\Controller\AbstractApiController;

use FOS\RestBundle\Controller\Annotations as Rest,
    FOS\RestBundle\Controller\Annotations\RouteResource;

use Brainstrap\CoreBundle\Entity\Rate\Time\EntityTime,
    Brainstrap\CoreBundle\Form\Rate\Time\EntityTimeType;

/**
 * @RouteResource("rate/time")
 */
class TimeController extends AbstractApiController
{
    public function __construct()
    {
        $this->form = new EntityTimeType();
        $this->entity = new EntityTime();
        $this->repository = "BrainstrapCoreBundle:Rate\Time\EntityTime";

    }
}
