<?php
/**
 * Created by PhpStorm.
 * User: karmis
 * Date: 02.04.14
 * Time: 1:01
 */

namespace Brainstrap\UserBundle\Handler;
use Brainstrap\UserBundle\Entity\User as User;
//use JMS\SerializerBundle\Serializer\Handler\SerializationHandlerInterface;
use JMS\SerializerBundle\Serializer\VisitorInterface;
use JMS\SerializerBundle\Serializer\SerializationHandlerInterface;

class UserHandler implements SerializationHandlerInterface
{
    public function serialize(VisitorInterface $visitor, $data, $type, &$handled)
    {
        if($data instanceof User){
            $handled = true;
            return $visitor->visitArray($user->toArray(), 'user');
        }
        return null;
    }
}