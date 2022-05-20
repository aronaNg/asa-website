<?php

namespace App\Form;

use     App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {


        $builder
            ->add('email', EmailType::class, [
                'label' => 'Votre email : ',
                'attr' => [
                    'class' => 'form-control mb-3'
                ]
            ])

            ->add('firstname', TextType::class, [
                'label' => 'Votre prenom : ',
                'attr' => [
                    'class' => 'form-control mb-3'
                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Votre nom : ',
                'attr' => [
                    'class' => 'form-control mb-3'
                ]
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'label' => "Accepter les conditions : ",
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous devez accepter les conditions du site.',
                    ]),
                ],
            ])
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options'  => array('label' => 'Votre mot de passe :'),
                'second_options' => array('label' => 'Repetez le mot de passe :'),
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
