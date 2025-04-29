<?php

namespace App\Repository;

use App\Entity\UsersSubjects;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class UsersSubjectsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UsersSubjects::class);
    }

    // Método para verificar si el usuario ha completado una materia
    public function hasCompletedSubject($userId, $subjectId): bool
    {
        return $this->createQueryBuilder('us')
            ->andWhere('us.userId = :user')
            ->andWhere('us.subjectId = :subject')
            ->andWhere('us.status = :status')
            ->setParameter('user', $userId)
            ->setParameter('subject', $subjectId)
            ->setParameter('status', 'completed') // Asumiendo que 'completed' es el estado que indica que la materia fue aprobada
            ->getQuery()
            ->getOneOrNullResult() !== null;
    }
}