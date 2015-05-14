<?php

namespace PS\PlaneBundle\Form;

use PS\PlaneBundle\Form\LocationType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AirportType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('location', new LocationType());
        $builder->add('readyToBoardPassengers');
        $builder->add('outPassengers');
        $builder->add('planes', 'entity', array(
            'class'    => 'PSPlaneBundle:Plane',
            'property' => 'name'
          ));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PS\PlaneBundle\Entity\Airport',
            'csrf_protection' => false,
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'airport';
    }
}
