<?php

namespace Brainstrap\CoreBundle\Form\Session\Group;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Brainstrap\CoreBundle\Form\Session\Anonim\AnonimSessionType;
class GroupSessionType extends AbstractType
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
            ->add('childs', 'collection', array(
                'type' => new AnonimSessionType(),
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
            'data_class' => 'Brainstrap\CoreBundle\Entity\Session\Group\GroupSession'
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
