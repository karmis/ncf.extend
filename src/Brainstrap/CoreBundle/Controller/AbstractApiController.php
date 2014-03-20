<?php

namespace Brainstrap\CoreBundle\Controller;

use Symfony\Component\BrowserKit\Response,
    Symfony\Component\HttpFoundation\Request;

use FOS\RestBundle\Controller\FOSRestController,
    FOS\RestBundle\Controller\Annotations as Rest;

use Brainstrap\CoreBundle\Exception\ValidateHttpException;

abstract class AbstractApiController extends FOSRestController
{
    protected $repository = null;
    protected $form = null;
    protected $entity = null;

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
     * @return array|Response
     */
    public function cpostAction(Request $request)
    {
        $entity = $this->getEntity();
        $form = $this->bind($this->getForm($entity), $request);
        if ($form->isValid()) {
            ;
            return $this->flush($entity, 'create');
        }


        return array(
            'form' => $form,
        );
    }

    /**
     * Обновление сущности
     * @param Request $request
     * @param $id
     * @return array|Response
     */
    public function putAction(Request $request, $id)
    {
        $entity = $this->getEntity($id);
        $form = $this->bind($this->getForm($entity), $request);
        if ($form->isValid()) {
            ;
            return $this->flush($entity, 'update');
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
        $entity->setInactive(true);
        return $this->flush($entity, 'remove');
    }

    protected function getEm()
    {
        return $this->getDoctrine()->getManager();
    }

    protected function getRepository($r = null)
    {
        if($r == null){
            $repository = $this->getEm()->getRepository($this->repository);
        } else {
            $repository = $this->getEm()->getRepository($r);
        }
        return $repository;
    }

    protected function getNewEntity()
    {
        return $this->entity;
    }

    protected function getNewForm()
    {
        return $this::createForm($this->form, $this->entity);
    }

    protected function bind($form, $request)
    {
        return $form->bind($request);
    }

    /**
     * TODO Отрефакторть. Переделать создание формы что бы оно корректно работало с handleRequest
     * TODO (см. https://github.com/FriendsOfSymfony/FOSRestBundle/issues/585)
     */
    protected function getForm($entity = null)
    {
        if ($entity != null) {
            $form = $this::createForm($this->form, $entity);
        } else {
            $form = $this->getNewForm();
        }

        return $form;
    }

    protected function getEntity($id = null, $r = null)
    {
        if ($id !== null && $r !== null) {
            $entity = $this->getRepository($r)->find($id);
            $this->validateFoundEntity($entity);
        } else if($id !==null && $r == null) {
            $entity = $this->getRepository()->find($id);
            $this->validateFoundEntity($entity);
        } else {
            $entity = $this->getNewEntity();
        }

        return $entity;
    }

    protected function validateFoundEntity($entity){
        if (!$entity) {
            throw new ValidateHttpException(404, "Не удалось найти запись");
        }
    }

    protected function flush($entity, $type = 'create')
    {
//        TODO $user->getCompany()->getId();
//        $this->logicalValidateEntitiyCompany()
        $em = $this->getEm();
        $em->persist($entity);
        $em->flush();
        try {

        } catch (\Exception $e) {
            throw new ValidateHttpException(500, "Не удалось выполнить запись");
        }

        if ($type !== 'create') {
            $status = 200;
        } else {
            $status = 201;
        }

        if ($type !== 'remove') {
            $resp = array("entity" => $entity);
        } else {
            $resp = array("entity" => null);
        }

        return new Response($resp, $status);
    }

    protected function getLinkEntities($id, $entityId, $repository)
    {
        $entity = $this->getEntity($id);
        $otherEntity = $this->getEntity($entityId, $repository);
        $this->logicalValidateEntities($entity, $otherEntity);
        return array(
            'entity' => $entity,
            'otherEntity' => $otherEntity
        );

    }

    protected function logicalValidateEntities($entity, $otherEntity)
    {
        // Принадлежность компании
        if(method_exists($entity, "getCompany") && method_exists($otherEntity, "getCompany")){
            $this->logicalValidateEntitiyCompany($entity->getCompany()->getId(), $otherEntity->getCompany()->getId());
        }

    }

    protected function logicalValidateEntitiyCompany($entityId, $companyId){
        if($entityId !== $companyId) {
            throw new ValidateHttpException(500, "Не удалось найти соответсвующую запись для данной сущности -----");
        }
    }
}
