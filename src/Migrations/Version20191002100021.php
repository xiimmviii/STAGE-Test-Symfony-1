<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191002100021 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE couleur (id INT AUTO_INCREMENT NOT NULL, couleur VARCHAR(35) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tarifs (id INT AUTO_INCREMENT NOT NULL, prestation VARCHAR(255) NOT NULL, tarif_jour NUMERIC(10, 2) DEFAULT NULL, tarif_nuit NUMERIC(10, 2) DEFAULT NULL, tarif_weekend NUMERIC(10, 2) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE contact');
        $this->addSql('ALTER TABLE entreprise CHANGE cp cp VARCHAR(255) NOT NULL, CHANGE telephone telephone VARCHAR(17) DEFAULT NULL, CHANGE siren siren VARCHAR(255) DEFAULT NULL, CHANGE siret siret VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE contenu DROP statut');
        $this->addSql('ALTER TABLE specificites CHANGE localisation1 localisation1 VARCHAR(255) NOT NULL, CHANGE localisation2 localisation2 VARCHAR(255) NOT NULL, CHANGE localisation3 localisation3 VARCHAR(255) NOT NULL, CHANGE localisation4 localisation4 VARCHAR(255) NOT NULL, CHANGE localisation5 localisation5 VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE partenaires CHANGE logo logo VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, prenom VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, societe VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, email VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, telephone VARCHAR(17) DEFAULT NULL COLLATE utf8mb4_unicode_ci, objet VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, message LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE couleur');
        $this->addSql('DROP TABLE tarifs');
        $this->addSql('ALTER TABLE contenu ADD statut VARCHAR(1) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE entreprise CHANGE cp cp INT NOT NULL, CHANGE telephone telephone VARCHAR(17) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE siren siren INT DEFAULT NULL, CHANGE siret siret INT DEFAULT NULL');
        $this->addSql('ALTER TABLE partenaires CHANGE logo logo VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE specificites CHANGE localisation1 localisation1 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE localisation2 localisation2 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE localisation3 localisation3 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE localisation4 localisation4 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE localisation5 localisation5 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
    }
}
