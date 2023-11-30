<?php

namespace App\Form;

use App\Entity\Accommodation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AccommodationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', ChoiceType::class, [
                'choices' => $options['accommodations'],
                'label' => 'Choosing your accommodation',
                'expanded' => true, // Utilisez true pour des boutons radio
                'multiple' => false, // Utilisez false pour une seule sélection
                'choice_label' => 'name', // Utilisez 'name' comme étiquette pour les choix
            ])

            // ->add('name')
            ->add('description')
            ->add('area')
            ->add('price')
            ->add('image');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Accommodation::class,
            'accommodations' => [],
        ]);
    }
}
