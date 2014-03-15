<?php
namespace Brainstrap\CoreBundle\Controller;

use Brainstrap\CoreBundle\Entity\Cart\Cart;
use Symfony\Component\BrowserKit\Response,
    Symfony\Component\HttpFoundation\Request;

use FOS\RestBundle\Controller\FOSRestController,
    FOS\RestBundle\Controller\Annotations as Rest,
    FOS\RestBundle\Controller\Annotations\RouteResource;

use Brainstrap\CoreBundle\Entity\Client\Client,
    Brainstrap\CoreBundle\Form\Client\ClientType,
    Brainstrap\CoreBundle\Exception\ValidateHttpException;

/**
 * @RouteResource("client")
 */
class ClientController extends FOSRestController
{
    /**
     * Возвращает коллецию
     * @return array
     */
    public function cgetAction()
    {
        $entities = $this->getRepository()->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Возвращает сущность
     * @param $id
     * @return array
     */
    public function getAction($id)
    {
        $entity = $this->getEntity($id);

        return array(
            'entity' => $entity,
        );
    }

    /**
     * Создание сущности
     * @param Request $request
     * @return array|\FOS\RestBundle\View\View
     */
    public function cpostAction(Request $request)
    {
        $entity = new Client();
        $form = $this->getForm($entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            if (!$entity->getLocked()) {
                $entity->setLocked(false);
            }

            // Привязка карт
            $this->linkCarts($entity->getCarts(), $em);
            $em->persist($entity);

            try {
                $em->flush();
            } catch (\Exception $e) {
                throw new ValidateHttpException(500, "Не удалось создать клиента");
            }
//
            return new Response(array("entity" => $entity), 201);
        }
//        }
        return array(
            'form' => $form,
        );
    }

    /**
     * Обновление сущности
     * @param Request $request
     * @param $id
     * @return array|Response
     * @throws \Brainstrap\CoreBundle\Exception\ValidateHttpException
     */
    public
    function putAction(Request $request, $id)
    {
        $entity = $this->getEntity($id);
        $form = $this->getForm($entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            if (!$entity->getLocked()) {
                $entity->setLocked(false);
            }

            // Привязка карт
            $this->linkCarts($entity->getCarts(), $em, $entity->getId());
            $em->persist($entity);

            try {
                $em->flush();
            } catch (\Exception $e) {
                throw new ValidateHttpException(500, "Не удалось обновить клиента");
            }
//
            return new Response(array("entity" => $entity), 201);
        }
        return array(
            'form' => $form,
        );
    }


    /**
     * Удаление сущности
     * @param $id
     * @return \FOS\RestBundle\View\View
     */
    public
    function deleteAction($id)
    {
        $entity = $this->getEntity($id);

        $em = $this->getDoctrine()->getManager();
        $em->remove($entity);
        $em->flush();

        return new Response(array("id" => null), 200);
    }

    /**
     * Получение сущности
     * @param $id
     * @throws \Brainstrap\CoreBundle\Exception\ValidateHttpException
     * @return mixed
     */
    private
    function getEntity($id)
    {
        $entity = $this->getRepository()->find($id);

        if (!$entity) {
            throw new ValidateHttpException(404, "Не удалось найти клиента");
        }

        return $entity;
    }

    /**
     * Возвращает репозиторий
     * @return mixed
     */
    private
    function getRepository()
    {
        $em = $this->getDoctrine()->getManager();

        $repository = $em->getRepository('BrainstrapCoreBundle:Client\Client');

        return $repository;
    }

    /**
     * TODO Отрефакторть. Переделать создание формы что бы оно корректно работало с handleRequest
     * TODO (см. https://github.com/FriendsOfSymfony/FOSRestBundle/issues/585)
     * @param $entity
     * @return \Symfony\Component\Form\Form
     */
    private
    function getForm($entity)
    {
        return $this::createForm(new ClientType(), $entity);
    }

    /**
     *
     * @param $carts
     * @param null $em
     * @throws \Brainstrap\CoreBundle\Exception\ValidateHttpException
     */
    private function linkCarts($carts, $em = null)
    {
        if($em === null){
            $em = $this->getDoctrine()->getManager();
        }
        if (isset($carts) && count($carts) > 0) {
            for ($i = 0; $i < count($carts); $i++) {
                $entityCart = $carts[$i];
                // Проверка блокировки карты
                if ($entityCart->getLocked()) {
                    throw new ValidateHttpException(500, "Карта с номером " . $entityCart->getCode() . " заблокирована");
                }
                // Ставим статус привязки карты
                if ($entityCart->getStatusBusy() === Cart::CART_BUSY_STATUS_FREE) {
                    $entityCart->setStatusBusy(Cart::CART_BUSY_STATUS_BUSY);
                    $em->persist($entityCart);
                } else {
                    throw new ValidateHttpException(500, "Карта с номером " . $entityCart->getCode() . "  уже была привязана другому клиенту");
                }

            }
        }
    }
}