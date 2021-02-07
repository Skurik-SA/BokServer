<?php

namespace App\Repository;

use App\Entity\WeatherFinal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method WeatherFinal|null find($id, $lockMode = null, $lockVersion = null)
 * @method WeatherFinal|null findOneBy(array $criteria, array $orderBy = null)
 * @method WeatherFinal[]    findAll()
 * @method WeatherFinal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WeatherFinalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WeatherFinal::class);
    }

    // /**
    //  * @return WeatherFinal[] Returns an array of WeatherFinal objects
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
    public function findOneBySomeField($value): ?WeatherFinal
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */


    /**
     * @return WeatherFinal[]
     */
    public function finalShowByID(int $posnum) : array {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT wf
            FROM App\Entity\WeatherFinal wf
            WHERE wf.id = ?1
            ORDER BY wf.id ASC'
        );

        $query->setParameter(1, $posnum);

//        $query->setParameter(2, 6);

        // returns an array of Product objects
        return $query->getResult();

    }


    /**
     * @return WeatherFinal[]
     */
    public function finalShowMAX() : array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT wf
            FROM App\Entity\WeatherFinal wf
            WHERE wf.id > (SELECT MAX(wf2.id) - 5
            FROM App\Entity\WeatherFinal wf2)
            ORDER BY wf.id ASC'
        );

        return $query->getResult();
    }

    /**
     * @return WeatherFinal[]
     */
    public function finalShowCITY($town) : array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT wf
            FROM App\Entity\WeatherFinal wf
            WHERE wf.city = :town
            ORDER BY wf.id ASC'
        )->setParameter('town', $town);

        return $query->getResult();
    }

}
