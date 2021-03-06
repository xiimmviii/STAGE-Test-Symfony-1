<?php

namespace App\Repository;

use App\Entity\Labels;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Labels|null find($id, $lockMode = null, $lockVersion = null)
 * @method Labels|null findOneBy(array $criteria, array $orderBy = null)
 * @method Labels[]    findAll()
 * @method Labels[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LabelsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Labels::class);
    }

}
