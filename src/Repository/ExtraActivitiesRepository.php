<?php

namespace App\Repository;

use App\Entity\ExtraActivities;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExtraActivities>
 *
 * @method ExtraActivities|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExtraActivities|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExtraActivities[]    findAll()
 * @method ExtraActivities[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExtraActivitiesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExtraActivities::class);
    }

//    /**
//     * @return ExtraActivities[] Returns an array of ExtraActivities objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ExtraActivities
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
