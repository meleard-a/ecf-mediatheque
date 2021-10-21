<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
              'label' => 'Prénom',
              'attr' => [
                'placeholder' => 'Paul'
              ]
            ])
            ->add('lastname', TextType::class, [
              'label' => 'Nom',
              'attr' => [
                'placeholder' => 'Dupont'
              ]
            ])
            ->add('birthdate', BirthdayType::class, [
              'label' => 'Date de naissance',
              'attr' => [
                'placeholder' => 'Select a value'
              ]
            ])
            ->add('address', TextType::class, [
              'label' => 'Adresse',
              'attr' => [
                'placeholder' => '2 rue des Lilas'
              ]
            ])
            ->add('zipcode', IntegerType::class, [
              'label' => 'Code Postal', 
              'attr' => [
                'placeholder' => '75000'
              ]
            ])
            ->add('city', TextType::class, [
              'label' => 'Ville',
              'attr' => [
                'placeholder' => 'La Chapelle-Curreaux'
              ]
            ])
            ->add('email', EmailType::class, [
              'label' => 'Email',
              'attr' => [
                'placeholder' => 'pauldupont@email.com'
              ]
            ])
            ->add('password', PasswordType::class, [
              'label' => 'Mot de Passe',
              'attr' => [
                'placeholder' => '8 charactères minimum'
              ]
            ])
            ->add('password_confirm', PasswordType::class, [
              'label' => 'Confirmez le Mot de Passe',
              'mapped' => false,
              'attr' => [
                'placeholder' => 'Confirmez le Mot de Passe'
              ]
            ])
            ->add('submit', SubmitType::class, [
              'label' => "S'INSCRIRE"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
