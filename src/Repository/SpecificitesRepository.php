<?php

namespace App\Repository;

use App\Entity\Specificites;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Specificites|null find($id, $lockMode = null, $lockVersion = null)
 * @method Specificites|null findOneBy(array $criteria, array $orderBy = null)
 * @method Specificites[]    findAll()
 * @method Specificites[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpecificitesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Specificites::class);
    }

    // /**
    //  * @return Specificites[] Returns an array of Specificites objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Specificites
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
