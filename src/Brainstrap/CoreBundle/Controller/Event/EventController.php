<?php

namespace Brainstrap\CoreBundle\Controller\Event;

use Brainstrap\CoreBundle\Controller\AbstractApiController;

use FOS\RestBundle\Controller\Annotations as Rest,
    FOS\RestBundle\Controller\Annotations\RouteResource;

use Brainstrap\CoreBundle\Entity\Event\Event,
    Brainstrap\CoreBundle\Form\Event\EventType,
    Brainstrap\CoreBundle\Exception\ValidateHttpException;

/**
 * @RouteResource("event")
 */
class EventController extends AbstractApiController
{

    public function __construct()
    {
        $this->form = new EventType();
        $this->entity = new Event();
        $this->repository = "BrainstrapCoreBundle:Event\Event";
    }

    public function linkCartAction($id, $cartId)
    {
//        die($id . " - " . $cartId);
        $entities = $this->getLinkEntities($id, $cartId, "BrainstrapCoreBundle:Cart\Cart");
        $entities['entity']->addCart($entities['otherEntity']);
//        die($entities['otherEntity']->getId() . "__");
        return $this->flush( $entities['entity'], 'link');
    }

    public function unlinkCartAction($id, $cartId)
    {
        $entities = $this->getLinkEntities($id, $cartId, "BrainstrapCoreBundle:Cart\Cart");
        $entities['entity']->removeCart($entities['otherEntity']);
        return $this->flush( $entities['entity'], 'unlink');
    }
}
