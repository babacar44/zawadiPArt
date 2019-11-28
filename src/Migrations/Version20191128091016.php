<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191128091016 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX child_id ON health');
        $this->addSql('ALTER TABLE health CHANGE child_id child_id INT NOT NULL');
        $this->addSql('ALTER TABLE missing CHANGE date_disparition date_disparition DATETIME NOT NULL, CHANGE date_retrouver date_retrouver DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE health CHANGE child_id child_id INT DEFAULT NULL');
        $this->addSql('CREATE INDEX child_id ON health (child_id)');
        $this->addSql('ALTER TABLE missing CHANGE date_disparition date_disparition DATE NOT NULL, CHANGE date_retrouver date_retrouver DATE DEFAULT NULL');
    }
}
