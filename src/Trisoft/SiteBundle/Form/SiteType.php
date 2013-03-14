<?php

namespace Trisoft\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('url', 'url')
            ->add('is_active')
         //   ->add('created_at')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Trisoft\SiteBundle\Entity\Site'
        ));
    }

    public function getName()
    {
        return 'trisoft_sitebundle_sitetype';
    }
}
