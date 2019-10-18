<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191018082344 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE specificites');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE specificites (id INT AUTO_INCREMENT NOT NULL, facebook VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, instagram VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, page_google VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, localisation1 VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, localisation2 VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, localisation3 VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, localisation4 VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, localisation5 VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, localisation6 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, localisation7 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, localisation8 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, localisation9 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, localisation10 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, competence1 VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, competence2 VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, competence3 VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, competence4 VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, competence5 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, competence6 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, competence7 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, competence8 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, competence9 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, competence10 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
    }
}
