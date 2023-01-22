<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230122214133 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE chicken (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, test VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8826BE9CE7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE corporations ADD ville VARCHAR(255) NOT NULL, ADD pays VARCHAR(255) NOT NULL, DROP ville_corpo, DROP country_corpo, CHANGE abreviation abreviation VARCHAR(255) NOT NULL, CHANGE resume resume VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE chicken');
        $this->addSql('ALTER TABLE corporations ADD ville_corpo VARCHAR(255) NOT NULL, ADD country_corpo VARCHAR(255) NOT NULL, DROP ville, DROP pays, CHANGE abreviation abreviation VARCHAR(255) DEFAULT NULL, CHANGE resume resume VARCHAR(255) DEFAULT NULL');
    }
}
