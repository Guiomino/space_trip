<?php

namespace App\Form;

use App\Entity\Stay;
use App\Entity\Resort;
use App\Entity\ExtraActivities;
use App\Entity\Accommodation;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class StayFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('resort', EntityType::class, [
                'class' => Resort::class,
                'choice_label' => function (Resort $resort) {
                    return $resort->getName();
                },
                'placeholder' => 'Select',
                'attr' => [
                    'data-id' => 'form_resort',
                ],
                'constraints' => [
                    new NotBlank(),
                ],
            ])

            ->add('number_of_travelers', ChoiceType::class, [
                'choices' => [
                    '1 person' => 1,
                    '2 persons' => 2,
                    '3 persons' => 3,
                    '4 persons' => 4,
                    '5 persons' => 5,
                    '6 persons' => 6,
                ],
                'placeholder' => 'Select',
                'attr' => [
                    'data-id' => 'form_number_of_travelers',
                ],
                'constraints' => [
                    new NotBlank(),
                ],
            ])

            ->add('starting_price', TextType::class, [
                'mapped' => false,
                'required' => false,
                'attr' => [
                    'readonly' => true, // Pour éviter que l'utilisateur ne modifie manuellement le champ
                    'id' => 'startingPrice', // ID pour référencer dans le JavaScript
                ],
            ])










            ->add('accommodation', EntityType::class, [
                'class' => Accommodation::class,
                'choice_label' => function (Accommodation $accommodation) {
                    return $accommodation->getName();
                },
                'placeholder' => 'Select',
                'attr' => [
                    'data-id' => 'form_accommodation',
                ],
                'constraints' => [
                    new NotBlank(),
                ],
            ])
            ->add('accommodation_price', TextType::class, [
                'mapped' => false,
                'required' => false,
                'attr' => [
                    'readonly' => true,
                    'id' => 'accommodationPrice',
                ],
            ])












            ->add('duration_weeks', ChoiceType::class, [
                'choices' => [
                    '1 week' => 1,
                    '2 weeks' => 2,
                    '3 weeks' => 3,
                    '4 weeks' => 4,
                    '5 weeks' => 5,
                    '6 weeks' => 6,
                    '7 weeks' => 7,
                    '8 weeks' => 8,
                ],
                'placeholder' => 'Select',
                'attr' => [
                    'data-id' => 'form_duration_weeks',
                ],
                'constraints' => [
                    new NotBlank(),
                ],
            ])
            ->add('check_in', DateTimeType::class, [
                'widget' => 'single_text',
                'constraints' => [
                    new NotBlank(),
                ],
            ])
            ->add('check_out', DateTimeType::class, [
                'widget' => 'single_text',
                'constraints' => [
                    new NotBlank(),
                ],
            ])







            ->add('date_time', DateTimeType::class, [
                'widget' => 'single_text',
                'input' => 'datetime',
                'required' => true,
                'attr' => [
                    'readonly' => true,
                ],
            ])










            ->add('extra_activities', EntityType::class, [
                'class' => ExtraActivities::class,
                'choice_label' => function (ExtraActivities $extra_activities) {
                    return $extra_activities->getName();
                },
            ])
            ->add('extra_price', EntityType::class, [
                'class' => ExtraActivities::class,
                'mapped' => false,
                'choice_label' => function (ExtraActivities $extra_activities) {
                    return sprintf('%s CC', $extra_activities->getPrice());
                },
            ])



            ->add('total_amount')



            ->add('submit', SubmitType::class, [
                'label' => 'Book',
                'attr' => [
                    'class' => 'submitBtn',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Stay::class,
        ]);
    }
}
