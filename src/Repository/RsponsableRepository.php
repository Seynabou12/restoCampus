<?php

namespace App\Repository;

use App\Entity\Rsponsable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Rsponsable|null find($id, $lockMode = null, $lockVersion = null)
 * @method Rsponsable|null findOneBy(array $criteria, array $orderBy = null)
 * @method Rsponsable[]    findAll()
 * @method Rsponsable[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RsponsableRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Rsponsable::class);
    }

    // /**
    //  * @return Rsponsable[] Returns an array of Rsponsable objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Rsponsable
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
