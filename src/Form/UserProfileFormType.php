<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Regex;

class UserProfileFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('pseudo', null, [
            'constraints' => [
                new Length([
                    'min' => 3,
                    'max' => 50,
                    'minMessage' => 'The nickname must have at least {{ limit }} characters.',
                    'maxMessage' => 'The nickname cannot exceed {{ limit }} characters.',
                ]),
            ],
        ])
        ->add('lang')
        ->add('phone', null, [
            'constraints' => [
                new Regex([
                    'pattern' => '/^\d{10}$/',
                    'message' => 'The phone number must be 10 digits.'
                ]),
            ],
        ])
        ->add('city', null, [
            'constraints' => [
                new Length([
                    'max' => 80,
                    'maxMessage' => 'La ville ne peut pas dépasser {{ limit }} caractères.',
                ]),
            ],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
