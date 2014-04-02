<?php
/**
 * Created by PhpStorm.
 * User: karmis
 * Date: 02.04.14
 * Time: 2:55
 */

namespace Brainstrap\UserBundle\Factory;

use JMS\SerializerBundle\DependencyInjection\HandlerFactoryInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

class UserSerializerHandlerFactory implements HandlerFactoryInterface
{
    public function getConfigKey()
    {
        return 'serializer_user';
    }
    public function getType(array $config)
    {
        return self::TYPE_SERIALIZATION;
    }
    public function addConfiguration(ArrayNodeDefinition $builder)
    {
        $builder
            ->addDefaultsIfNotSet()
            ->defaultValue(array())
        ;
    }
    public function getHandlerId(ContainerBuilder $container, array $config)
    {
        return 'serializer.user_handler';
    }
}