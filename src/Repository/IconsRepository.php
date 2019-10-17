<?php

namespace App\Repository;

use App\Entity\Icons;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Icons|null find($id, $lockMode = null, $lockVersion = null)
 * @method Icons|null findOneBy(array $criteria, array $orderBy = null)
 * @method Icons[]    findAll()
 * @method Icons[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IconsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Icons::class);
    }


}
