<?php

namespace Brainstrap\OAuthBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class BrainstrapOAuthBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSOAuthServerBundle';
    }
}
