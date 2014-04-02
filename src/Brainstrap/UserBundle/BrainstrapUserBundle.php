<?php

namespace Brainstrap\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use JMS\SerializerBundle\DependencyInjection\JMSSerializerExtension;
class BrainstrapUserBundle extends Bundle
{
    public function configureSerializerExtension(JMSSerializerExtension $ext)
    {
        $ext->addHandlerFactory(new UserSerializerHandlerFactory());
    }
}
