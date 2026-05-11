<?php

namespace App\Form;

use App\Entity\Etudiant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Promotion;

class EtudiantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom de l\'étudiant',
                'attr' => ['class' => 'form-control mb-3', 'placeholder' => 'Ex: Dupont']
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Prénom',
                'attr' => ['class' => 'form-control mb-3', 'placeholder' => 'Ex: Marie']
            ])
            ->add('filiere', ChoiceType::class, [
                'label' => 'Filière',
                'choices'  => [
                    'SLAM' => 'SLAM',
                    'SISR' => 'SISR',
                ],
                'placeholder' => '',
                'attr' => ['class' => 'form-control mb-3']
            ])
            ->add('annPromotion', EntityType::class, [
                'class' => Promotion::class,
                'label' => 'Année de promotion',
                'choice_label' => function (Promotion $p) {
                    return $p->getClasse() . ' ' . $p->getSession();
                },
                'placeholder' => '',
            ])
            
            // On ne met pas "isArchived" car un nouvel étudiant n'est pas archivé par défaut
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Etudiant::class,
        ]);
    }
}