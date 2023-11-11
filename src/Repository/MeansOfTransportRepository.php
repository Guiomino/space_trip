<?php

namespace App\Repository;

use App\Entity\MeansOfTransport;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MeansOfTransport>
 *
 * @method MeansOfTransport|null find($id, $lockMode = null, $lockVersion = null)
 * @method MeansOfTransport|null findOneBy(array $criteria, array $orderBy = null)
 * @method MeansOfTransport[]    findAll()
 * @method MeansOfTransport[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MeansOfTransportRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MeansOfTransport::class);
    }

//    /**
//     * @return MeansOfTransport[] Returns an array of MeansOfTransport objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?MeansOfTransport
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
