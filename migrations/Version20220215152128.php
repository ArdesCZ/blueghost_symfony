<?php

// Migrace přvede Entitu na SQL dotaz a odešle jí do databáze, vytváří se příkazem symfony console  make:migration, dále přes symfony console doctrine:migrations:migrate
declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220215152128 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE kontakt (id INT AUTO_INCREMENT NOT NULL, jmeno VARCHAR(25) NOT NULL, prijmeni VARCHAR(25) NOT NULL, telefonni_cislo INT NOT NULL, email VARCHAR(50) NOT NULL, poznamka VARCHAR(200) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE kontakt');
    }
}
