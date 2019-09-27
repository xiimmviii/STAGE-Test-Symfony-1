<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190927113419 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE contact');
        $this->addSql('ALTER TABLE specificites CHANGE localisation1 localisation1 VARCHAR(255) NOT NULL, CHANGE localisation2 localisation2 VARCHAR(255) NOT NULL, CHANGE localisation3 localisation3 VARCHAR(255) NOT NULL, CHANGE localisation4 localisation4 VARCHAR(255) NOT NULL, CHANGE localisation5 localisation5 VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE partenaires CHANGE logo logo VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, prenom VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, societe VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, email VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, telephone VARCHAR(17) DEFAULT NULL COLLATE utf8mb4_unicode_ci, objet VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, message LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE partenaires CHANGE logo logo VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE specificites CHANGE localisation1 localisation1 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE localisation2 localisation2 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE localisation3 localisation3 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE localisation4 localisation4 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE localisation5 localisation5 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
    }
}
