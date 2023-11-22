<?php

// src/Form/ResortFormType.php
namespace App\Form;

use App\Entity\Resort;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ResortFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', ChoiceType::class, [
                'choices' => $options['resorts'],
                'label' => 'Choosing where to stay',
                'expanded' => true, // Utilisez true pour des boutons radio
                'multiple' => false, // Utilisez false pour une seule sélection
                'choice_label' => 'name', // Utilisez 'name' comme étiquette pour les choix
            ]);

        // ->add('name')
        // ->add('description')
        // ->add('place')
        // ->add('area')
        // ->add('starting_price')
        // ->add('order_number')
        // ->add('image');

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Resort::class,
            'resorts' => [],
        ]);
    }
}
