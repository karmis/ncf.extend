<?php
/**
 * Created by PhpStorm.
 * User: karmis
 * Date: 20.03.14
 * Time: 2:08
 */

namespace Brainstrap\CoreBundle\Controller\Session;

use Brainstrap\CoreBundle\Controller\AbstractApiController;

use FOS\RestBundle\Controller\Annotations as Rest,
    FOS\RestBundle\Controller\Annotations\RouteResource;
use Symfony\Component\Validator\Constraints\DateTime;

class AbstractSessionController extends  AbstractApiController
{

    /**
     * Удаление сущности
     * @param $id
     * @return \FOS\RestBundle\View\View
     */
    public function deleteAction($id)
    {
        $entity = $this->getEntity($id);
        $entity->setInactive(true);
        $entity->setFinished(new \DateTime());
        return $this->flush($entity, 'remove');
    }

    /**
     * Персистенция для сессии
     * @param $request
     * @param $entity
     * @throws \Brainstrap\CoreBundle\Exception\ValidateHttpException
     */
//    private function  persistSession($request, $entity, $em = null){
//        $cartId = $request->get("cart");
//        $companyId = $request->get("company");
//        $rateId = $request->get("rate");
//        $statusStartId = $request->get("statusStart");
//        $eventId = $request->get("eventId");
//
//        if(empty($cartId) || empty($companyId) || empty($rateId) || empty($statusStartId)){
//            throw new ValidateHttpException(500, "Не все параметры были переданы");
//        }
//
//        if(!is_numeric($cartId) || !is_numeric($companyId) || !is_numeric($rateId) || !is_numeric($statusStartId)){
//            throw new ValidateHttpException(500, "Не все параметры были валидны");
//        }
//
//        if($em === null){
//            $em = $this->getDoctrine()->getManager();
//        }
//
//        $cartEntity = $em->getRepository('BrainstrapCoreBundle:Cart\Cart')->find($cartId);
//        $companyEntity = $em->getRepository('BrainstrapCoreBundle:Company\Company')->find($companyId);
//        $rateEntity = $em->getRepository('BrainstrapCoreBundle:Rate\Time\EntityTime')->find($rateId);
//        $statusStartEntity = $em->getRepository('BrainstrapCoreBundle:Session\Status\Start\SessionStatusStart')->find($statusStartId);
//
//        if(!$statusStartEntity || !$rateEntity || !$companyEntity || !$cartEntity){
//            throw new ValidateHttpException(404, "Не все параметры были найдены в базе");
//        }
//
//        if($cartEntity->getCompany()->getId() !== $companyEntity->getId()){
//            throw new ValidateHttpException(500, "Карта не принадлежи этойт компании---");
//        }
//
//        if(!empty($eventId) && is_numeric($eventId)){
//            $eventEntity = $em->getRepository('BrainstrapCoreBundle:Event\Event')->find($eventId);
//            if(!$eventEntity){
//                throw new ValidateHttpException(404, "Событие не найдено");
//            }
//            if($eventEntity->getCompany()->getId() !== $companyEntity->getId()){
//                throw new ValidateHttpException(500, "Событие не принадлежи этойт компании+++");
//            }
//            $entity->setEvent($eventEntity);
//        }
//
//
//        $entity->setCart($cartEntity);
//        $entity->setCompany($companyEntity);
//        $entity->setRate($rateEntity);
//        $entity->setStatusStart($statusStartEntity);
//    }
} 