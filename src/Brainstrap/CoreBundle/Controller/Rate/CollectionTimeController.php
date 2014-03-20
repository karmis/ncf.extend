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


use Brainstrap\CoreBundle\Entity\Rate\Time\CollectionTime,
    Brainstrap\CoreBundle\Form\Rate\Time\CollectionTimeType;

/**
 * @RouteResource("rate/time/collection")
 */
class CollectionTimeController extends AbstractApiController
{
    public function __construct()
    {
        $this->form = new CollectionTimeType();
        $this->entity = new CollectionTime();
        $this->repository = "BrainstrapCoreBundle:Rate\Time\CollectionTime";

    }
}
