<?php

namespace App\Form;

use App\Entity\Entreprise;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class EntrepriseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom de l\'entreprise',
                'attr' => ['class' => 'form-control mb-3', 'placeholder' => 'Ex: Dupont']
            ])
            ->add('adresse', TextType::class, [
                'label' => 'Adresse',
                'attr' => ['class' => 'form-control mb-3', 'placeholder' => 'Ex: 123 Rue de la Paix']
            ])
            ->add('ville', TextType::class, [
                'label' => 'Ville',
                'attr' => ['class' => 'form-control mb-3', 'placeholder' => 'Ex: Paris']
            ])
            ->add('cp', TextType::class, [
                'label' => 'Code postal',
                'attr' => ['class' => 'form-control mb-3', 'placeholder' => 'Ex: 75000']
            ])
            ->add('contact', TextType::class, [
                'label' => 'Contact',
                'attr' => ['class' => 'form-control mb-3', 'placeholder' => 'Ex: Jean Dupont']
            ])
            ->add('tel', TextType::class, [
                'label' => 'Téléphone',
                'attr' => ['class' => 'form-control mb-3', 'placeholder' => 'Ex: 01 23 45 67 89']
            ])
            ->add('email', TextType::class, [
                'label' => 'Email',
                'attr' => ['class' => 'form-control mb-3', 'placeholder' => 'Ex: contact@entreprise.com']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Entreprise::class,
        ]);
    }
}