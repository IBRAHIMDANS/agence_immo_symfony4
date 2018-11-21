<?php

namespace App\Form;

use App\Entity\PropertySeach;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PropertySearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('minSurface',IntegerType::class,[
                'required' => false,
                'label' => false,
                'attr' =>[
                    'placeholder' => 'Surface Minimale'
                ]
            ])
            ->add('maxprice',IntegerType::class,[
                'required' => false,
                'label' => false,
                'attr' =>[
                    'placeholder' => 'Budget '
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PropertySeach::class,
            'method' => 'get',
            'csrf_protection' => false
        ]);
    }

    public function getBlockPrefix()
    {
        return "";
    }
}
