<?php
namespace Brainstrap\CoreBundle\Controller;

use Symfony\Component\BrowserKit\Response,
    Symfony\Component\HttpFoundation\Request;

use FOS\RestBundle\Controller\FOSRestController,
    FOS\RestBundle\Controller\Annotations as Rest,
    FOS\RestBundle\Controller\Annotations\RouteResource;

use Brainstrap\CoreBundle\Entity\Cart\Cart,
    Brainstrap\CoreBundle\Form\Cart\CartType,
    Brainstrap\CoreBundle\Exception\ValidateHttpException;

/**
 * @RouteResource("cart")
 */
class CartController extends FOSRestController
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
        $entity = new Cart();
        $form = $this->getForm($entity);

        $form->bind($request);


        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $company = $this->getCompanyForCart($entity->getCompany(), $em);
            $this->setCartType($entity->getType(), $entity);
            $entity->setCompany($company);

            if (!$entity->getLocked()) {
                $entity->setLocked(false);
            }

            $em->persist($entity);

            $em->flush();
            try {

            } catch (\Exception $e) {
                throw new ValidateHttpException(500, "Не удалось создать карту");
            }
//            die(print_r($entity->getCode()));
            return new Response(array("entity" => $entity), 201);
        }

        return array(
            'form' => $form,
        );
    }

    /**
     * Обновление сущности
     * @param Request $request
     * @param $id
     * @return array|\FOS\RestBundle\View\View
     */
    public function putAction(Request $request, $id)
    {
        $entity = $this->getEntity($id);
        $form = $this->getForm($entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $company = $this->getCompanyForCart($entity->getCompany(), $em);
            $this->setCartType($entity->getType(), $entity);
            $entity->setCompany($company);

            if (!$entity->getLocked()) {
                $entity->setLocked(false);
            }

            $em->persist($entity);

            $em->flush();
            try {
                $em->flush();
            } catch (\Exception $e) {
                throw new ValidateHttpException(500, "Не удалось создать клиента");
            }

            return new Response(array("entity" => $entity), 200);
        }

        return array(
            'form' => $form,
        );
    }

    /**
     * Удаление карты
     * Фактически - смена статуса карты с занята на свободна
     * @param $id
     * @return \FOS\RestBundle\View\View
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $this->getEntity($id);
        $clients = $entity->getClient();
        foreach($clients as $client){
            $entity->removeClient($client);
            $client->removeCart($entity);
        }
        $entity->setStatusBusy(Cart::CART_BUSY_STATUS_FREE);
        $em->persist($entity);
        $em->flush();
//        try {
//
//        } catch (\Exception $e) {
//            throw new ValidateHttpException(500, "Не удалось удалить карту");
//        }

        return new Response(array("id" => null), 200);
    }

    /**
     * Получение сущности
     * @param $id
     * @throws \Brainstrap\CoreBundle\Exception\ValidateHttpException
     * @return mixed
     */
    private function getEntity($id)
    {
        $entity = $this->getRepository()->find($id);

        if (!$entity) {
            throw new ValidateHttpException(404, "Не удалось найти карту");
        }

        return $entity;
    }

    /**
     * Возвращает репозиторий
     * @return mixed
     */
    private function getRepository()
    {
        $em = $this->getDoctrine()->getManager();

        $repository = $em->getRepository('BrainstrapCoreBundle:Cart\Cart');

        return $repository;
    }

    /**
     * TODO Отрефакторть. Переделать создание формы что бы оно корректно работало с handleRequest
     * TODO (см. https://github.com/FriendsOfSymfony/FOSRestBundle/issues/585)
     * @param $entity
     * @return \Symfony\Component\Form\Form
     */
    private function getForm($entity)
    {
        return $this::createForm(new CartType(), $entity);
    }

    /**
     * @param $id
     * @param null $em
     * @return \Brainstrap\CoreBundle\Entity\Company\Company
     * @throws \Brainstrap\CoreBundle\Exception\ValidateHttpException
     */
    private function  getCompanyForCart($id, $em = null)
    {
        if ($em === null) {
            $em = $this->getDoctrine()->getManager();
        }
        try {
            $company = $em->getRepository('BrainstrapCoreBundle:Company\Company')->find($id);
        } catch (\Exception $e) {
            throw new ValidateHttpException(500, "Не удалось получить компанию");
        }

        if (!$company) {
            throw new ValidateHttpException(404, "Компания не существует");
        }

        return $company;
    }

    private function setCartType($type, $entity)
    {
        switch ($type) {
            case "single":
                $entity->setType(Cart::CART_TYPE_SINGLE);
                break;
            case "group":
                $entity->setType(Cart::CART_TYPE_GROUP);
                break;
            default:
                $entity->setType(Cart::CART_TYPE_SINGLE);
                break;
        }
    }
}