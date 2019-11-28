<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191127105302 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE health (id INT AUTO_INCREMENT NOT NULL, child_id INT NOT NULL, nom_maladie VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, montant INT NOT NULL, statut VARCHAR(255) NOT NULL, piece_jointe VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_CEDA2313DD62C21B (child_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE education (id INT AUTO_INCREMENT NOT NULL, child_id INT NOT NULL, niveau_scolaire VARCHAR(255) DEFAULT NULL, besoins VARCHAR(255) NOT NULL, montant INT NOT NULL, UNIQUE INDEX UNIQ_DB0A5ED2DD62C21B (child_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateurs (id INT AUTO_INCREMENT NOT NULL, nom_complet VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, profile VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE donators (id INT AUTO_INCREMENT NOT NULL, nom_complet VARCHAR(255) DEFAULT NULL, raison_social VARCHAR(255) DEFAULT NULL, adress VARCHAR(255) DEFAULT NULL, telephone VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE child (id INT AUTO_INCREMENT NOT NULL, nom_complet VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, photo VARCHAR(255) DEFAULT NULL, date_nais DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE missing (id INT AUTO_INCREMENT NOT NULL, date_disparition DATE NOT NULL, date_retrouver DATE DEFAULT NULL, dernier_endroit_vue VARCHAR(255) DEFAULT NULL, endroit_retrouver VARCHAR(255) DEFAULT NULL, nom_complet VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE donation (id INT AUTO_INCREMENT NOT NULL, donator_id INT NOT NULL, child_id INT NOT NULL, montant INT NOT NULL, date_donation DATE NOT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_31E581A0831BACAF (donator_id), INDEX IDX_31E581A0DD62C21B (child_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE health ADD CONSTRAINT FK_CEDA2313DD62C21B FOREIGN KEY (child_id) REFERENCES child (id)');
        $this->addSql('ALTER TABLE education ADD CONSTRAINT FK_DB0A5ED2DD62C21B FOREIGN KEY (child_id) REFERENCES child (id)');
        $this->addSql('ALTER TABLE donation ADD CONSTRAINT FK_31E581A0831BACAF FOREIGN KEY (donator_id) REFERENCES donators (id)');
        $this->addSql('ALTER TABLE donation ADD CONSTRAINT FK_31E581A0DD62C21B FOREIGN KEY (child_id) REFERENCES child (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE donation DROP FOREIGN KEY FK_31E581A0831BACAF');
        $this->addSql('ALTER TABLE health DROP FOREIGN KEY FK_CEDA2313DD62C21B');
        $this->addSql('ALTER TABLE education DROP FOREIGN KEY FK_DB0A5ED2DD62C21B');
        $this->addSql('ALTER TABLE donation DROP FOREIGN KEY FK_31E581A0DD62C21B');
        $this->addSql('DROP TABLE health');
        $this->addSql('DROP TABLE education');
        $this->addSql('DROP TABLE utilisateurs');
        $this->addSql('DROP TABLE donators');
        $this->addSql('DROP TABLE child');
        $this->addSql('DROP TABLE missing');
        $this->addSql('DROP TABLE donation');
    }
}
