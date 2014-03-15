<?php
/**
 * Created by PhpStorm.
 * User: karmis
 * Date: 15.03.14
 * Time: 21:05
 */

namespace Brainstrap\CoreBundle\Controller\Rate;

use Symfony\Component\BrowserKit\Response,
    Symfony\Component\HttpFoundation\Request;

use FOS\RestBundle\Controller\FOSRestController,
    FOS\RestBundle\Controller\Annotations as Rest,
    FOS\RestBundle\Controller\Annotations\RouteResource;

use Brainstrap\CoreBundle\Entity\Rate\Time\EntityTime,
    Brainstrap\CoreBundle\Entity\Rate\Time\CollectionTime,
    Brainstrap\CoreBundle\Form\Rate\Time\EntityTimeType,
    Brainstrap\CoreBundle\Form\Rate\Time\CollectionTimeType,
    Brainstrap\CoreBundle\Exception\ValidateHttpException;

/**
 * @RouteResource("rate/time")
 */
class TimeController extends FOSRestController
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
        $entity = new EntityTime();
        $form = $this->getForm($entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($entity);

            try {
                $em->flush();
            } catch (\Exception $e) {
                throw new ValidateHttpException(500, "Не удалось создать компанию");
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

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();
            try {

            } catch (\Exception $e) {
                throw new ValidateHttpException(500, "Не удалось обновить компанию-----+-+-");
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
        $em->remove($entity);
        try {
            $em->flush();
        } catch (\Exception $e) {
            throw new ValidateHttpException(500, "Не удалось удалить компанию");
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
            throw new ValidateHttpException(404, "Не удалось найти организацию");
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

        $repository = $em->getRepository('BrainstrapCoreBundle:Rate\Time\EntityTime');

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
        return $this::createForm(new EntityTimeType(), $entity);
    }
}
