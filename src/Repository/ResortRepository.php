<?php

namespace App\Repository;

use App\Entity\Resort;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Resort>
 *
 * @method Resort|null find($id, $lockMode = null, $lockVersion = null)
 * @method Resort|null findOneBy(array $criteria, array $orderBy = null)
 * @method Resort[]    findAll()
 * @method Resort[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResortRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Resort::class);
    }

//    /**
//     * @return Resort[] Returns an array of Resort objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Resort
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
