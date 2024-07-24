<?php

namespace App\Form;

use App\Entity\Booking;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class BookingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $today = new \DateTime();
        $builder
            ->add('datetime', DateTimeType::class, [
                'attr' => [
                    'class' => 'form-input-container'
                ],
                'data' => $today,
                'label' => 'Date et heure d\'arrivé',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'date_format' => 'dd/MM/yyyy',
                //TODO: check heure -2
                'hours' => range($today->format('H'), 23),
                'minutes' => [00, 30],
                'years' => range(intval($today->format('Y')), intval($today->format('Y')) +1),
                'constraints' => [
                    new Assert\NotBlank(message: 'Champs obligatoire'),
                ]
            ])

            ->add('name', TextType::class, [
                'attr' => [
                    'class' => 'form-input',
                    'minlength' => 2,
                    'maxlength' => 25,
                ],
                'label' => 'Nom',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'constraints' => [
                    new Assert\NotBlank(message: 'Champs obligatoire'),
                    new Assert\Length(['min' => 2, 'max' => 25]),
                    new Assert\Type(type: 'alpha')
                ]
            ])

            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'form-input'
                ],
                'label' => 'Email',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Email(message: 'Veuillez enter une adresse e-mail valide')
                ]
            ])

            ->add('phone', TelType::class, [
                'attr' => [
                    'class' => 'form-input'
                ],
                'label' => 'Numéro de téléphone',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'constraints' => [
                    new Assert\NotBlank(message: 'Champs obligatoire'),
                    new Assert\Length(['max' => 15]),
                    new Assert\Type(type: 'digit')
                ]
            ])

            ->add('guests', ChoiceType::class, [
                'attr' => [
                    'class' => 'form-input'
                ],
                'label' => 'Nombre de personnes',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'choices' => [
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                    '6' => '6',
                    '7' => '7',
                    '8' => '8',
                    '9' => '9',
                    '10' => '10',
                    '11' => '11',
                    '12' => '12',
                    '13' => '13',
                    '14' => '14',
                    '15' => '15',
                    '16' => '16',
                ]
            ])
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'button',
                ],
                'label' => 'Réserver'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Booking::class,
        ]);
    }
}
