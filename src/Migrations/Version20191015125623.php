<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191015125623 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE design ADD bottom_trs_w LONGTEXT DEFAULT NULL, ADD bottom_trs_c LONGTEXT DEFAULT NULL, ADD top_trs_w LONGTEXT DEFAULT NULL, ADD top_trs_c LONGTEXT DEFAULT NULL, ADD soustitre_icon_w LONGTEXT DEFAULT NULL, ADD soustitre_icon_c LONGTEXT DEFAULT NULL, DROP code, DROP nom');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE design ADD code LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, ADD nom VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP bottom_trs_w, DROP bottom_trs_c, DROP top_trs_w, DROP top_trs_c, DROP soustitre_icon_w, DROP soustitre_icon_c');
    }
}
