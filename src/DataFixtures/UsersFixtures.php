<?php

namespace App\DataFixtures;

use App\Entity\Users;
use App\Entity\Careers; // Asegúrate de importar tu entidad Careers
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UsersFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Crea una instancia de Careers
        $career = new Careers();
        $career->setCareerName('Computer Science'); // Usar setCareerName
        $manager->persist($career); // Persiste la carrera

        // Crea un usuario y asigna la carrera
        $user1 = new Users();
        $user1->setName('John')
              ->setLastName('Doe')
              ->setEmail('john.doe@example.com')
              ->setPassword(password_hash('password', PASSWORD_BCRYPT))
              ->setRoles(['ROLE_USER'])
              ->setCareerId($career); // Asigna la carrera

        $manager->persist($user1);

        // Crea otro usuario y asigna la misma o diferente carrera
        $user2 = new Users();
        $user2->setName('Jane')
              ->setLastName('Doe')
              ->setEmail('jane.doe@example.com')
              ->setPassword(password_hash('password', PASSWORD_BCRYPT))
              ->setRoles(['ROLE_ADMIN'])
              ->setCareerId($career); // Asigna la carrera

        $manager->persist($user2);

        // Persistir todos los cambios en la base de datos
        $manager->flush();
    }
}
