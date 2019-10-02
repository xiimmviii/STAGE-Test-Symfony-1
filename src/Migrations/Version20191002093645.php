<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191002093645 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE photo (id INT AUTO_INCREMENT NOT NULL, galerie INT DEFAULT NULL, photo VARCHAR(255) NOT NULL, INDEX IDX_14B784189E7D1590 (galerie), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B784189E7D1590 FOREIGN KEY (galerie) REFERENCES galerie (id)');
        $this->addSql('DROP TABLE contact');
        $this->addSql('ALTER TABLE galerie ADD nom VARCHAR(255) NOT NULL, ADD description LONGTEXT DEFAULT NULL, DROP nom_galerie, DROP photo1, DROP description1, DROP photo2, DROP description2, DROP photo3, DROP description3, DROP photo4, DROP description4');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, prenom VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, societe VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, email VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, telephone VARCHAR(17) DEFAULT NULL COLLATE utf8mb4_unicode_ci, objet VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, message LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE photo');
        $this->addSql('ALTER TABLE galerie ADD photo1 VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD photo2 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD description2 LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD photo3 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD description3 LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD photo4 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD description4 LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE nom nom_galerie VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE description description1 LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci');
    }
}
