<?php

namespace Brainstrap\CoreBundle\Form\Client;

use Brainstrap\CoreBundle\Form\Cart\CartType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ClientType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('sname')
            ->add('carts', 'collection', array(
                'type' => new CartType(),
                'allow_add' => true,
                'allow_delete' => true
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Brainstrap\CoreBundle\Entity\Client\Client'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return '';
    }
}
