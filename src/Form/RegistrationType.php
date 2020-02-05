<?php

namespace App\Form;

use App\Security\Registration;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use function Sodium\add;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fullName', TextType::class, ['label' => 'Your name'])
            ->add('email', EmailType::class, ['label' => 'Your email will be your username'])
            ->add('rawPassword', RepeatedType::class, ['type' => PasswordType::class, 'first_options' => ['label' => 'Please pick a password'], 'second_options' => ['label' => 'Please confirm password'], 'invalid_message' => 'Passwords do not match'])
            ->add('terms', CheckboxType::class, ['label' => 'I have read the terms and conditions', 'mapped' => false, 'constraints' => [new IsTrue(['message' => 'Please accept the terms'])]]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'error_mapping' => [
                    'emailNotInPassword' => 'rawPassword'
                ],
                'data_class' => Registration::class
            ]
        );
    }
}
