<?php

namespace App\Repository;

use App\Entity\Subjects;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class SubjectsRepository extends ServiceEntityRepository
{
    private $usersSubjectsRepo;

    public function __construct(ManagerRegistry $registry, UsersSubjectsRepository $usersSubjectsRepo)
    {
        parent::__construct($registry, Subjects::class);
        $this->usersSubjectsRepo = $usersSubjectsRepo;
    }

    /**
     * Obtiene las materias disponibles para un usuario.
     *
     * @param int $userId El ID del usuario.
     * @return Subjects[] Lista de materias que el usuario puede seleccionar.
     */
    public function getAvailableSubjectsForUser(int $userId): array
    {
        // Obtener las materias pendientes
        $pendingSubjects = $this->getPendingSubjectsForUser($userId);

        // Filtrar las materias según los prerrequisitos
        $availableSubjects = [];

        foreach ($pendingSubjects as $subject) {
            $prerequisite = $subject->getPrerequisites();

            // Si no tiene prerrequisitos o el usuario ha completado el prerrequisito
            if (!$prerequisite || $this->usersSubjectsRepo->hasCompletedSubject($userId, $prerequisite->getId())) {
                $availableSubjects[] = $subject;
            }
        }

        return $availableSubjects;
    }

    /**
     * Obtiene las materias pendientes de un usuario.
     *
     * @param int $userId El ID del usuario.
     * @return array
     */
    public function getPendingSubjectsForUser(int $userId): array
    {
        // QueryBuilder para obtener las materias pendientes del usuario
        return $this->createQueryBuilder('s')
            ->leftJoin('App\Entity\UsersSubjects', 'us', 'WITH', 's.id = us.subjectId')
            ->where('us.userId = :userId')
            ->andWhere('us.status != :completed')
            ->setParameter('userId', $userId) // Pasamos directamente el ID del usuario
            ->setParameter('completed', 'completed')
            ->getQuery()
            ->getResult();
    }
}
