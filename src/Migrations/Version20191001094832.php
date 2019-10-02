<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191001094832 extends AbstractMigration
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
        $this->addSql('ALTER TABLE galerie ADD nom_galerie VARCHAR(255) NOT NULL, ADD photo1 VARCHAR(255) NOT NULL, ADD description1 LONGTEXT DEFAULT NULL, ADD photo2 VARCHAR(255) DEFAULT NULL, ADD description2 LONGTEXT DEFAULT NULL, ADD photo3 VARCHAR(255) DEFAULT NULL, ADD description3 LONGTEXT DEFAULT NULL, ADD photo4 VARCHAR(255) DEFAULT NULL, ADD description4 LONGTEXT DEFAULT NULL, DROP photo, DROP description');
        $this->addSql('ALTER TABLE tarifs CHANGE tarif_jour tarif_jour NUMERIC(10, 2) DEFAULT NULL, CHANGE tarif_nuit tarif_nuit NUMERIC(10, 2) DEFAULT NULL, CHANGE tarif_weekend tarif_weekend NUMERIC(10, 2) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, prenom VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, societe VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, email VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, telephone VARCHAR(17) DEFAULT NULL COLLATE utf8mb4_unicode_ci, objet VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, message LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE galerie ADD photo VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD description VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP nom_galerie, DROP photo1, DROP description1, DROP photo2, DROP description2, DROP photo3, DROP description3, DROP photo4, DROP description4');
        $this->addSql('ALTER TABLE tarifs CHANGE tarif_jour tarif_jour DOUBLE PRECISION NOT NULL, CHANGE tarif_nuit tarif_nuit DOUBLE PRECISION DEFAULT NULL, CHANGE tarif_weekend tarif_weekend DOUBLE PRECISION DEFAULT NULL');
    }
}
