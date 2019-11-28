<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191124132044 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE education ADD child_id INT NOT NULL');
        $this->addSql('ALTER TABLE education ADD CONSTRAINT FK_DB0A5ED2DD62C21B FOREIGN KEY (child_id) REFERENCES child (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DB0A5ED2DD62C21B ON education (child_id)');
        $this->addSql('ALTER TABLE donation ADD child_id INT NOT NULL');
        $this->addSql('ALTER TABLE donation ADD CONSTRAINT FK_31E581A0DD62C21B FOREIGN KEY (child_id) REFERENCES child (id)');
        $this->addSql('CREATE INDEX IDX_31E581A0DD62C21B ON donation (child_id)');
        $this->addSql('ALTER TABLE health ADD child_id INT NOT NULL');
        $this->addSql('ALTER TABLE health ADD CONSTRAINT FK_CEDA2313DD62C21B FOREIGN KEY (child_id) REFERENCES child (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CEDA2313DD62C21B ON health (child_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE donation DROP FOREIGN KEY FK_31E581A0DD62C21B');
        $this->addSql('DROP INDEX IDX_31E581A0DD62C21B ON donation');
        $this->addSql('ALTER TABLE donation DROP child_id');
        $this->addSql('ALTER TABLE education DROP FOREIGN KEY FK_DB0A5ED2DD62C21B');
        $this->addSql('DROP INDEX UNIQ_DB0A5ED2DD62C21B ON education');
        $this->addSql('ALTER TABLE education DROP child_id');
        $this->addSql('ALTER TABLE health DROP FOREIGN KEY FK_CEDA2313DD62C21B');
        $this->addSql('DROP INDEX UNIQ_CEDA2313DD62C21B ON health');
        $this->addSql('ALTER TABLE health DROP child_id');
    }
}
