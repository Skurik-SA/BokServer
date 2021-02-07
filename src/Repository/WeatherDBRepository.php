<?php

namespace App\Repository;

use App\Entity\WeatherDB;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method WeatherDB|null find($id, $lockMode = null, $lockVersion = null)
 * @method WeatherDB|null findOneBy(array $criteria, array $orderBy = null)
 * @method WeatherDB[]    findAll()
 * @method WeatherDB[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WeatherDBRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WeatherDB::class);
    }

    // /**
    //  * @return WeatherDB[] Returns an array of WeatherDB objects
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
    public function findOneBySomeField($value): ?WeatherDB
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
