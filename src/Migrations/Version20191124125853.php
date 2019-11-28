<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191124125853 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE education (id INT AUTO_INCREMENT NOT NULL, niveau_scolaire VARCHAR(255) DEFAULT NULL, besoins VARCHAR(255) NOT NULL, montant INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE child (id INT AUTO_INCREMENT NOT NULL, nom_complet VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, photo VARCHAR(255) DEFAULT NULL, date_nais DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE donators (id INT AUTO_INCREMENT NOT NULL, nom_complet VARCHAR(255) NOT NULL, raison_social VARCHAR(255) DEFAULT NULL, adress VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateurs (id INT AUTO_INCREMENT NOT NULL, nom_complet VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, profile VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE donation (id INT AUTO_INCREMENT NOT NULL, montant INT NOT NULL, date_donation DATE NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE missing (id INT AUTO_INCREMENT NOT NULL, date_disparition DATE NOT NULL, date_retrouver DATE DEFAULT NULL, dernier_endroit_vue VARCHAR(255) DEFAULT NULL, endroit_retrouver VARCHAR(255) DEFAULT NULL, nom_complet VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE health (id INT AUTO_INCREMENT NOT NULL, nom_maladie VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, montant INT NOT NULL, statut VARCHAR(255) NOT NULL, piece_jointe VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE education');
        $this->addSql('DROP TABLE child');
        $this->addSql('DROP TABLE donators');
        $this->addSql('DROP TABLE utilisateurs');
        $this->addSql('DROP TABLE donation');
        $this->addSql('DROP TABLE missing');
        $this->addSql('DROP TABLE health');
    }
}
