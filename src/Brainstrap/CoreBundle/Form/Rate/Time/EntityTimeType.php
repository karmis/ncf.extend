<?php

namespace Brainstrap\CoreBundle\Form\Rate\Time;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EntityTimeType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('caption')
            ->add('last')
            ->add('afterLast')
            ->add('company')
            ->add('hours', 'collection', array(
                'type' => new CollectionTimeType(),
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
            'data_class' => 'Brainstrap\CoreBundle\Entity\Rate\Time\EntityTime'
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
