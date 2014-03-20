<?php

namespace Brainstrap\CoreBundle\Form\Session\Simple;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SimpleSessionType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('company')
            ->add('cart')
            ->add('rate')
            ->add('statusStart')
            ->add('statusEnd')
            ->add('event')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Brainstrap\CoreBundle\Entity\Session\Simple\SimpleSession'
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
