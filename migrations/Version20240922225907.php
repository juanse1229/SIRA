<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240922225907 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE careers (id INT AUTO_INCREMENT NOT NULL, career_name VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE roles (id INT AUTO_INCREMENT NOT NULL, role_name VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE schedules (id INT AUTO_INCREMENT NOT NULL, subject_id_id INT DEFAULT NULL, group_number INT NOT NULL, start_time TIME NOT NULL, end_time TIME NOT NULL, created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_313BDC8E6ED75F8F (subject_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subjects (id INT AUTO_INCREMENT NOT NULL, career_id_id INT NOT NULL, name VARCHAR(255) NOT NULL, credits INT NOT NULL, semester INT NOT NULL, created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_AB259917F6491C94 (career_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, career_id_id INT NOT NULL, name VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_1483A5E9F6491C94 (career_id_id), UNIQUE INDEX UNIQ_IDENTIFIER_NAME (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users_schedules (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, schedule_id_id INT NOT NULL, created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_5746A66F9D86650F (user_id_id), INDEX IDX_5746A66F831D5E0B (schedule_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users_subjects (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, subject_id_id INT NOT NULL, status VARCHAR(10) NOT NULL, created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_D064B2CD9D86650F (user_id_id), INDEX IDX_D064B2CD6ED75F8F (subject_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE schedules ADD CONSTRAINT FK_313BDC8E6ED75F8F FOREIGN KEY (subject_id_id) REFERENCES subjects (id)');
        $this->addSql('ALTER TABLE subjects ADD CONSTRAINT FK_AB259917F6491C94 FOREIGN KEY (career_id_id) REFERENCES careers (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9F6491C94 FOREIGN KEY (career_id_id) REFERENCES careers (id)');
        $this->addSql('ALTER TABLE users_schedules ADD CONSTRAINT FK_5746A66F9D86650F FOREIGN KEY (user_id_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE users_schedules ADD CONSTRAINT FK_5746A66F831D5E0B FOREIGN KEY (schedule_id_id) REFERENCES schedules (id)');
        $this->addSql('ALTER TABLE users_subjects ADD CONSTRAINT FK_D064B2CD9D86650F FOREIGN KEY (user_id_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE users_subjects ADD CONSTRAINT FK_D064B2CD6ED75F8F FOREIGN KEY (subject_id_id) REFERENCES subjects (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE schedules DROP FOREIGN KEY FK_313BDC8E6ED75F8F');
        $this->addSql('ALTER TABLE subjects DROP FOREIGN KEY FK_AB259917F6491C94');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9F6491C94');
        $this->addSql('ALTER TABLE users_schedules DROP FOREIGN KEY FK_5746A66F9D86650F');
        $this->addSql('ALTER TABLE users_schedules DROP FOREIGN KEY FK_5746A66F831D5E0B');
        $this->addSql('ALTER TABLE users_subjects DROP FOREIGN KEY FK_D064B2CD9D86650F');
        $this->addSql('ALTER TABLE users_subjects DROP FOREIGN KEY FK_D064B2CD6ED75F8F');
        $this->addSql('DROP TABLE careers');
        $this->addSql('DROP TABLE roles');
        $this->addSql('DROP TABLE schedules');
        $this->addSql('DROP TABLE subjects');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE users_schedules');
        $this->addSql('DROP TABLE users_subjects');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
