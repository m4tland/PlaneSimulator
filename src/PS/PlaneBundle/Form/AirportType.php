<?php

namespace PS\PlaneBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AirportType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // TODO
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PS\PlaneBundle\Entity\Airport',
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
