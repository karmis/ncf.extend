<?php

namespace Brainstrap\CoreBundle\Controller;

use Symfony\Component\BrowserKit\Response,
    Symfony\Component\HttpFoundation\Request;

use FOS\RestBundle\Controller\FOSRestController,
    FOS\RestBundle\Controller\Annotations as Rest,
    FOS\RestBundle\Controller\Annotations\RouteResource;

use Brainstrap\CoreBundle\Entity\Session\SessionStatus,
    Brainstrap\CoreBundle\Form\Session\SessionStatusType,
    Brainstrap\CoreBundle\Exception\ValidateHttpException;

/**
 * @RouteResource("session/status")
 */
class SessionStatusController extends FOSRestController
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
        $entity = new SessionStatus();
        $form = $this->getForm($entity);
        $form->bind($request);
        if(!$entity->getLocked()){
            $entity->setLocked(false);
        }
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            try {
                $em->flush();
            } catch (\Exception $e) {
                throw new ValidateHttpException(500, "Не удалось создать запись");
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
        $form->bind($request);
        if(!$entity->getLocked()){
            $entity->setLocked(false);
        }
        if ($form->isValid()) {
            // die(print_r($form->getData()));
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            try {
                $em->flush();
            } catch (\Exception $e) {
                throw new ValidateHttpException(500, "Не удалось обновить запись");
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
        $entity->setLocked(true);
        $em->persist($entity);
        try {
            $em->flush();
        } catch (\Exception $e) {
            throw new ValidateHttpException(500, "Не удалось удалить запись");
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
            throw new ValidateHttpException(404, "Не удалось найти запись");
        }

        //$this->

        return $entity;
    }

    /**
     * Возвращает репозиторий
     * @return mixed
     */
    protected function getRepository()
    {
        $em = $this->getDoctrine()->getManager();

        $repository = $em->getRepository('BrainstrapCoreBundle:Session\SessionStatus');

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
        return $this::createForm(new SessionStatusType(), $entity);
    }
}
