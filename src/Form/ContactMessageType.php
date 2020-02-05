<?php

declare(strict_types=1);

namespace App\Form;

use App\Contact\Message;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactMessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('sender', EmailType::class, ['label' => 'contact.sender'])
            ->add('subject', TextType::class, ['label' => 'contact.subject'])
            ->add('content', TextareaType::class, ['label' => 'contact.content']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Message::class,
            'attr' => [
                'novalidate' => true
            ]
        ]);
    }
}
