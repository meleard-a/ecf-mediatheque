<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
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
            ->add('birthdate', TextType::class, [
              'label' => 'Date de naissance',
              'attr' => [
                'placeholder' => 'JJ/MM/AAAA'
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
            ->add('password', RepeatedType::class, [
              'type' =>PasswordType::class,
              'invalid_message' => 'Le mot de passe et la confirmation doivent être identiques',
              'label' => 'Mot de Passe',
              'required' => true,
              'first_options' => [ 'label' => 'Mot de passe'],
              'second_options' => [ 'label' => 'Confirmez votre mot de passe'],
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
