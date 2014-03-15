<?php

namespace Brainstrap\CoreBundle\Controller;

use Symfony\Component\BrowserKit\Response,
    Symfony\Component\HttpFoundation\Request;

use FOS\RestBundle\Controller\FOSRestController,
    FOS\RestBundle\Controller\Annotations as Rest,
    FOS\RestBundle\Controller\Annotations\RouteResource;

use Brainstrap\CoreBundle\Entity\Session\SimpleSession,
    Brainstrap\CoreBundle\Form\Session\SimpleSessionType,
    Brainstrap\CoreBundle\Exception\ValidateHttpException;

/**
 * @RouteResource("session/simple")
 */
class SimpleSessionController extends FOSRestController
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
        $entity = new SimpleSession();
        $form = $this->getForm($entity);
        $em = $this->getDoctrine()->getManager();
        $this->persistSession($request, $entity, $em);
        $form->bind($request);

        if ($form->isValid()) {


            $em->persist($entity);
            $em->flush();

            try {

            } catch (\Exception $e) {
                throw new ValidateHttpException(500, "Не удалось создать сессию");
            }

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
        $em = $this->getDoctrine()->getManager();
        $this->persistSession($request, $entity, $em);
        $form->bind($request);


        if ($form->isValid()) {
            // die(print_r($form->getData()));
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            try {
                $em->flush();
            } catch (\Exception $e) {
                throw new ValidateHttpException(500, "Не удалось обновить сессию");
            }

            return new Response(array("entity" => $entity), 200);
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
    public function deleteAction($id)
    {
        $entity = $this->getEntity($id);

        $em = $this->getDoctrine()->getManager();
        $entity->setFinished(new \DateTime());
        $em->persist($entity);
        try {
            $em->flush();
        } catch (\Exception $e) {
            throw new ValidateHttpException(500, "Не удалось удалить сессию");
        }

        return new Response(array("id" => null), 200);
    }

    /**
     * Получение сущности
     * @param $id
     * @throws \Brainstrap\CoreBundle\Exception\ValidateHttpException
     * @return mixed
     */
    protected function getEntity($id)
    {
        $entity = $this->getRepository()->find($id);

        if (!$entity) {
            throw new ValidateHttpException(404, "Не удалось найти сессию");
        }

        return $entity;
    }

    /**
     * Возвращает репозиторий
     * @return mixed
     */
    protected function getRepository()
    {
        $em = $this->getDoctrine()->getManager();

        $repository = $em->getRepository('BrainstrapCoreBundle:Session\SimpleSession');

        return $repository;
    }

    /**
     * TODO Отрефакторть. Переделать создание формы что бы оно корректно работало с handleRequest
     * TODO (см. https://github.com/FriendsOfSymfony/FOSRestBundle/issues/585)
     * @param $entity
     * @return \Symfony\Component\Form\Form
     */
    protected function getForm($entity)
    {
        return $this::createForm(new SimpleSessionType(), $entity);
    }

    /**
     * Персистенция для сессии
     * @param $request
     * @param $entity
     * @throws \Brainstrap\CoreBundle\Exception\ValidateHttpException
     */
    private function  persistSession($request, $entity, $em = null){
        $cartId = $request->get("cart");
        $companyId = $request->get("company");
        $rateId = $request->get("rate");
        $statusId = $request->get("status");

        if(empty($cartId) || empty($companyId) || empty($rateId) || empty($statusId)){
            throw new ValidateHttpException(500, "Не все параметры были переданы");
        }

        if(!is_numeric($cartId) || !is_numeric($companyId) || !is_numeric($rateId) || !is_numeric($statusId)){
            throw new ValidateHttpException(500, "Не все параметры были валидны");
        }

        if($em === null){
            $em = $this->getDoctrine()->getManager();
        }

        $cartEntity = $em->getRepository('BrainstrapCoreBundle:Cart\Cart')->find($cartId);
        $companyEntity = $em->getRepository('BrainstrapCoreBundle:Company\Company')->find($companyId);
        $rateEntity = $em->getRepository('BrainstrapCoreBundle:Rate\Time\EntityTime')->find($rateId);
        $statusEntity = $em->getRepository('BrainstrapCoreBundle:Session\SessionStatus')->find($statusId);

        if(!$statusEntity || !$rateEntity || !$companyEntity || !$cartEntity){
            throw new ValidateHttpException(404, "Не все параметры были найдены в базе");
        }

        $entity->setCart($cartEntity);
        $entity->setCompany($companyEntity);
        $entity->setRate($rateEntity);
        $entity->setStatus($statusEntity);
    }
}
