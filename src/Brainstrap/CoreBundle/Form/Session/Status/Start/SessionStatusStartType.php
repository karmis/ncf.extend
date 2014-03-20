<?php

namespace Brainstrap\CoreBundle\Form\Session\Status\Start;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SessionStatusStartType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('caption')
            ->add('company')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Brainstrap\CoreBundle\Entity\Session\Status\Start\SessionStatusStart'
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
