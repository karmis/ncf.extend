<?php

namespace Brainstrap\CoreBundle\Form\Session\Status\End;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SessionStatusEndType extends AbstractType
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
            'data_class' => 'Brainstrap\CoreBundle\Entity\Session\Status\End\SessionStatusEnd'
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
