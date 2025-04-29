<?php

namespace App\Repository;

use App\Entity\Schedules;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Schedules>
 */
class SchedulesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Schedules::class);
    }
    public function findAvailableSchedules($subjects)
    {
        $entityManager = $this->getEntityManager();

        $queryBuilder = $entityManager
            ->createQueryBuilder()
            ->select('s.id as id, s.groupNumber as groupNumber, sub.name as name, s.startTime as startTime, s.endTime as endTime, s.day as day')
            ->from(Schedules::class, 's')
            ->innerJoin('App\Entity\Subjects', 'sub', 'WITH', 's.subject_id = sub.id')
            ->where('sub.id IN (:subjects)')
            ->setParameter('subjects', $subjects);

        return $queryBuilder->getQuery()->getResult();
    }


    //    /**
    //     * @return Schedules[] Returns an array of Schedules objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('s.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Schedules
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
