<?php
namespace App\Repository;

use App\Entity\Stage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class StageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Stage::class);
    }

    public function findAllForList(): array
    {
        return $this->createQueryBuilder('s')
            ->leftJoin('s.etudiant', 'e')->addSelect('e')
            ->leftJoin('s.entreprise', 'ent')->addSelect('ent')
            ->orderBy('e.nom', 'ASC')
            ->addOrderBy('e.prenom', 'ASC')
            ->getQuery()
            ->getResult();
    }

}
