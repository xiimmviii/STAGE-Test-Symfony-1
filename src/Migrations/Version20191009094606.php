<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191009094606 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE reseaux (id INT AUTO_INCREMENT NOT NULL, instagram VARCHAR(255) DEFAULT NULL, facebook VARCHAR(255) DEFAULT NULL, google VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE localisation (id INT AUTO_INCREMENT NOT NULL, secteur1 VARCHAR(255) DEFAULT NULL, secteur2 VARCHAR(255) DEFAULT NULL, secteur3 VARCHAR(255) DEFAULT NULL, secteur4 VARCHAR(255) DEFAULT NULL, secteur5 VARCHAR(255) DEFAULT NULL, secteur6 VARCHAR(255) DEFAULT NULL, secteur7 VARCHAR(255) DEFAULT NULL, secteur8 VARCHAR(255) DEFAULT NULL, secteur9 VARCHAR(255) DEFAULT NULL, secteur10 VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competences (id INT AUTO_INCREMENT NOT NULL, competence1 VARCHAR(255) NOT NULL, competence2 VARCHAR(255) DEFAULT NULL, competence3 VARCHAR(255) DEFAULT NULL, competence4 VARCHAR(255) DEFAULT NULL, competence5 VARCHAR(255) DEFAULT NULL, competence6 VARCHAR(255) DEFAULT NULL, competence7 VARCHAR(255) DEFAULT NULL, competence8 VARCHAR(255) DEFAULT NULL, competence9 VARCHAR(255) DEFAULT NULL, competence10 VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE specificites');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE specificites (id INT AUTO_INCREMENT NOT NULL, facebook VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, instagram VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, page_google VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, localisation1 VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, localisation2 VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, localisation3 VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, localisation4 VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, localisation5 VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, localisation6 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, localisation7 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, localisation8 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, localisation9 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, localisation10 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, competence1 VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, competence2 VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, competence3 VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, competence4 VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, competence5 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, competence6 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, competence7 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, competence8 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, competence9 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, competence10 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE reseaux');
        $this->addSql('DROP TABLE localisation');
        $this->addSql('DROP TABLE competences');
    }
}