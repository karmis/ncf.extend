<?php
/**
 * Created by PhpStorm.
 * User: karmis
 * Date: 20.03.14
 * Time: 23:16
 */

namespace Brainstrap\OAuthBundle\Form\Model;

class Authorize
{
    protected $allowAccess;

    public function getAllowAccess()
    {
        return $this->allowAccess;
    }

    public function setAllowAccess($allowAccess)
    {
        $this->allowAccess = $allowAccess;
    }
}