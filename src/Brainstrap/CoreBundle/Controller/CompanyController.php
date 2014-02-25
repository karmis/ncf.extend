<?php

namespace Brainstrap\CoreBundle\Controller;

use Symfony\Component\Form\Extension\Validator\Constraints\Form,
    Symfony\Component\HttpFoundation\Request;

use FOS\RestBundle\Controller\FOSRestController,
    FOS\RestBundle\Controller\Annotations as Rest,
    FOS\RestBundle\Util\Codes,
    FOS\RestBundle\Controller\Annotations\RouteResource;

use Brainstrap\CoreBundle\Entity\Company\Company,
    Brainstrap\CoreBundle\Form\Company\CompanyType,
    Brainstrap\CoreBundle\Exception\ValidateHttpException;

/**
 * @RouteResource("company")
 */
class CompanyController extends FOSRestController
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
        $entity = new Company();
        $form = $this->getForm($entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirectView(
                $this->generateUrl(
                    'get_company',
                    array('id' => $entity->getId())

                ),
                Codes::HTTP_CREATED
            );
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
            // die(print_r($form->getData()));
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();

            return $this->view($form->getData(), Codes::HTTP_NO_CONTENT);
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
        $em->flush();

        return $this->view(null, Codes::HTTP_NO_CONTENT);
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

        $repository = $em->getRepository('BrainstrapCoreBundle:Company\Company');

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
        return $this::createForm(new CompanyType(), $entity);
    }
}