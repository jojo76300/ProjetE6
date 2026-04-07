<?php

namespace App\Form;

use App\Entity\Entreprise;
use App\Entity\Etudiant;
use App\Entity\Stage;
use App\Entity\Utilisateur;
use Doctrine\Common\Collections\Order;
use Doctrine\ORM\Mapping\OrderBy;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Repository\EtudiantRepository;
use App\Repository\EntrepriseRepository;
use App\Repository\UtilisateurRepository;
use Doctrine\DBAL\Query;
use Doctrine\ORM\QueryBuilder;

class StageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('etudiant', EntityType::class, [
                'placeholder' => 'Sélectionnez un étudiant',
                'class' => Etudiant::class,
                'required' => true,
                'query_builder' => function (EtudiantRepository $er) : QueryBuilder {
                    return $er->createQueryBuilder('e')
                        ->orderBy('e.nom', 'ASC')
                        ->addOrderBy('e.prenom', 'ASC');
                },
                'choice_label' => function (Etudiant $etudiant) {
                    return $etudiant->getNom() . ' ' . $etudiant->getPrenom();
                },
            ])
            ->add('dateDebut', null, [
                'required' => true,
            ])
            ->add('dateFin', null, [
                'required' => true
            ])
            ->add('entreprise', EntityType::class, [
                'placeholder' => 'Sélectionnez une entreprise',
                'class' => Entreprise::class,
                'query_builder' => function (EntrepriseRepository $er) : QueryBuilder {
                    return $er->createQueryBuilder('e')
                        ->orderBy('e.nom', 'ASC');
                },
                'choice_label' => 'nom',
            ])
            ->add('profSuivi', EntityType::class, [
                'placeholder' => 'Sélectionnez un professeur de suivi',
                'class' => Utilisateur::class,
                'query_builder' => function (UtilisateurRepository $u) : QueryBuilder {
                    return $u->createQueryBuilder('u')
                        ->orderBy('u.email', 'ASC');
                },
                'choice_label' => 'email',
            ])
            ->add('profVisite', EntityType::class, [
                'placeholder' => 'Sélectionnez un professeur de visite',
                'class' => Utilisateur::class,
                'query_builder' => function (UtilisateurRepository $u) : QueryBuilder {
                    return $u->createQueryBuilder('u')
                        ->orderBy('u.email', 'ASC');
                },
                'choice_label' => 'email',
            ])
            ->add('commentaire', null, [
                'attr' => ['rows' => 4],
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Stage::class,
        ]);
    }
}
