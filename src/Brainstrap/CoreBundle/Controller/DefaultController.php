<?php

namespace Brainstrap\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BrainstrapCoreBundle:Default:index.html.twig', array('name' => $name));
    }
}
