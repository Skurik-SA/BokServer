<?php

namespace App\Repository;

use App\Entity\Wetherbox;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Wetherbox|null find($id, $lockMode = null, $lockVersion = null)
 * @method Wetherbox|null findOneBy(array $criteria, array $orderBy = null)
 * @method Wetherbox[]    findAll()
 * @method Wetherbox[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WetherboxRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Wetherbox::class);
    }

    // /**
    //  * @return Wetherbox[] Returns an array of Wetherbox objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Wetherbox
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
