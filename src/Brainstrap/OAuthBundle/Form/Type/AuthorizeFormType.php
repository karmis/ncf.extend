<?php
/**
 * Created by PhpStorm.
 * User: karmis
 * Date: 20.03.14
 * Time: 23:15
 */
namespace Brainstrap\OAuthBundle\Form\Type;

use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\AbstractType;

class AuthorizeFormType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('allowAccess', 'checkbox', array(
            'label' => 'Allow access',
        ));
    }

    public function getDefaultOptions(array $options)
    {
        return array('data_class' => 'Brainstrap\OAuthBundle\Form\Model\Authorize');
    }

    public function getName()
    {
        return 'acme_oauth_server_authorize';
    }

}