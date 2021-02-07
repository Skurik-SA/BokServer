<?php

namespace App\Repository;

use App\Entity\Testenty;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Testenty|null find($id, $lockMode = null, $lockVersion = null)
 * @method Testenty|null findOneBy(array $criteria, array $orderBy = null)
 * @method Testenty[]    findAll()
 * @method Testenty[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TestentyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Testenty::class);
    }

    // /**
    //  * @return Testenty[] Returns an array of Testenty objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Testenty
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
