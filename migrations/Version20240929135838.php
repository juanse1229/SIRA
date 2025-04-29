<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240929135838 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Migración para crear la tabla de usuarios y agregar columnas necesarias.';
    }

    public function up(Schema $schema): void
    {
        // Cambios en las tablas existentes
        $this->addSql('ALTER TABLE careers ADD updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\''); // Elimina la línea que agrega created_at
        $this->addSql('ALTER TABLE roles CHANGE role_name role_name VARCHAR(255) NOT NULL, CHANGE created_at created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE updated_at updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\';');
        $this->addSql('ALTER TABLE schedules ADD subject_id_id INT DEFAULT NULL, DROP subject_id, CHANGE updated_at updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\';');
        // Asegúrate de no agregar columnas duplicadas aquí
    
        // Creación de la tabla users
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) DEFAULT NULL, updated_at TIMESTAMP(0) DEFAULT NULL, career_id INT NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_NAME (name), PRIMARY KEY(id))');
        
        // Agrega usuarios de prueba
        $this->addSql("INSERT INTO users (name, roles, password, last_name, email, created_at, updated_at, career_id) VALUES
        ('testuser1', '[]', 'hashed_password1', 'Test', 'test1@example.com', NOW(), NOW(), 1),
        ('testuser2', '[]', 'hashed_password2', 'User', 'test2@example.com', NOW(), NOW(), 1)");
    }
    
    

    public function down(Schema $schema): void
    {
        // Reversión de cambios
        $this->addSql('ALTER TABLE careers ADD ceated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', DROP created_at, CHANGE updated_at updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE roles CHANGE role_name role_name VARCHAR(50) NOT NULL, CHANGE created_at created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE updated_at updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE schedules DROP FOREIGN KEY FK_313BDC8E6ED75F8F');
        $this->addSql('DROP INDEX IDX_313BDC8E6ED75F8F ON schedules');
        $this->addSql('ALTER TABLE schedules ADD subject_id INT NOT NULL, DROP subject_id_id, CHANGE created_at created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE updated_at updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE subjects DROP FOREIGN KEY FK_AB259917B58CDA09');
        $this->addSql('ALTER TABLE subjects DROP FOREIGN KEY FK_AB2599173D366F0D');
        $this->addSql('DROP INDEX IDX_AB259917B58CDA09 ON subjects');
        $this->addSql('DROP INDEX UNIQ_AB2599173D366F0D ON subjects');
        $this->addSql('ALTER TABLE subjects DROP prerequisites_id, CHANGE created_at created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE updated_at updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9F6491C94');
        $this->addSql('DROP INDEX IDX_1483A5E9F6491C94 ON users');
        $this->addSql('DROP TABLE users');
        $this->addSql('ALTER TABLE users_schedules DROP FOREIGN KEY FK_5746A66F9D86650F');
        $this->addSql('ALTER TABLE users_schedules DROP FOREIGN KEY FK_5746A66F831D5E0B');
        $this->addSql('DROP INDEX IDX_5746A66F9D86650F ON users_schedules');
        $this->addSql('DROP INDEX IDX_5746A66F831D5E0B ON users_schedules');
        $this->addSql('ALTER TABLE users_schedules ADD user_id INT NOT NULL, ADD schedule_id INT NOT NULL, DROP user_id_id, DROP schedule_id_id, CHANGE created_at created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE updated_at updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE users_subjects DROP FOREIGN KEY FK_D064B2CD9D86650F');
        $this->addSql('ALTER TABLE users_subjects DROP FOREIGN KEY FK_D064B2CD6ED75F8F');
        $this->addSql('DROP INDEX IDX_D064B2CD9D86650F ON users_subjects');
        $this->addSql('DROP INDEX IDX_D064B2CD6ED75F8F ON users_subjects');
        $this->addSql('ALTER TABLE users_subjects ADD user_id INT NOT NULL, ADD subject_id INT NOT NULL, DROP user_id_id, DROP subject_id_id, CHANGE status status VARCHAR(255) NOT NULL, CHANGE created_at created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE updated_at updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }
}
