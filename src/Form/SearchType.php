<?php

namespace App\Form;

use App\Classe\Search;
use App\Entity\TypeBook;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormBuilderInterface;

class SearchType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('string', TextType::class, [
        'label' => false,
        'required' => false,
        'attr' => [
          'placeholder' => 'Votre recherche ...',
          'class' => 'form-control-sm'
        ]
        ])
      ->add('categories', EntityType::class, [
        'label' => false,
        'required' => false,
        'class' => TypeBook::class,
        'multiple' => true,
        'expanded' => true,
        ]
      )
      ->add('submit', SubmitType::class, [
        'label' => 'Filtrer',
        'attr' => [
          'class' => 'btn btn-secondary'
        ]
        ]);
  }

  public function configureOptions(OptionsResolver $resolver)
  {
      $resolver->setDefaults([
          'data_class' => Search::class,
          'method' => 'GET',
          'crsf_protection' => false,
      ]);
  }

  public function getBlockPrefix()
  {
    return '';
  }
}