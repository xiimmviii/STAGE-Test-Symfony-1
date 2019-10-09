<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191009120711 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE localisation DROP secteur2, DROP secteur3, DROP secteur4, DROP secteur5, DROP secteur6, DROP secteur7, DROP secteur8, DROP secteur9, DROP secteur10');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE localisation ADD secteur2 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD secteur3 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD secteur4 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD secteur5 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD secteur6 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD secteur7 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD secteur8 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD secteur9 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD secteur10 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
    }
}
