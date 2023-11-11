<?php

namespace App\Repository;

use App\Entity\PlanetCharacteristics;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PlanetCharacteristics>
 *
 * @method PlanetCharacteristics|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlanetCharacteristics|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlanetCharacteristics[]    findAll()
 * @method PlanetCharacteristics[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlanetCharacteristicsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlanetCharacteristics::class);
    }

//    /**
//     * @return PlanetCharacteristics[] Returns an array of PlanetCharacteristics objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PlanetCharacteristics
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
