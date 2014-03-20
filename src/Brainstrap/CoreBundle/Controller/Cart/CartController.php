<?php
namespace Brainstrap\CoreBundle\Controller\Cart;

use Brainstrap\CoreBundle\Controller\AbstractApiController;

use FOS\RestBundle\Controller\FOSRestController,
    FOS\RestBundle\Controller\Annotations as Rest,
    FOS\RestBundle\Controller\Annotations\RouteResource;

use Brainstrap\CoreBundle\Entity\Cart\Cart,
    Brainstrap\CoreBundle\Form\Cart\CartType,
    Brainstrap\CoreBundle\Exception\ValidateHttpException;

/**
 * @RouteResource("cart")
 */
class CartController extends AbstractApiController
{
    public function __construct()
    {
        $this->form = new CartType();
        $this->entity = new Cart();
        $this->repository = "BrainstrapCoreBundle:Cart\Cart";
    }
}