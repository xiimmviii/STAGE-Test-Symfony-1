<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190923080344 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, societe VARCHAR(255) DEFAULT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(17) DEFAULT NULL, objet VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contenu (id INT AUTO_INCREMENT NOT NULL, section VARCHAR(255) NOT NULL, titre VARCHAR(255) NOT NULL, sous_titre VARCHAR(255) NOT NULL, texte LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entreprise (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, statut_rcs VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) NOT NULL, cp INT NOT NULL, ville VARCHAR(255) NOT NULL, telephone VARCHAR(17) NOT NULL, mail_gerant VARCHAR(255) NOT NULL, mail_contact VARCHAR(255) NOT NULL, siren INT DEFAULT NULL, siret INT DEFAULT NULL, activite VARCHAR(255) NOT NULL, nom_gerant VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE galerie (id INT AUTO_INCREMENT NOT NULL, photo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partenaires (id INT AUTO_INCREMENT NOT NULL, nom_partenaire VARCHAR(255) NOT NULL, site_partenaire VARCHAR(255) NOT NULL, logo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specificites (id INT AUTO_INCREMENT NOT NULL, facebook VARCHAR(255) DEFAULT NULL, instagram VARCHAR(255) DEFAULT NULL, page_google VARCHAR(255) DEFAULT NULL, localisation1 VARCHAR(255) DEFAULT NULL, localisation2 VARCHAR(255) DEFAULT NULL, localisation3 VARCHAR(255) DEFAULT NULL, localisation4 VARCHAR(255) DEFAULT NULL, localisation5 VARCHAR(255) DEFAULT NULL, localisation6 VARCHAR(255) DEFAULT NULL, localisation7 VARCHAR(255) DEFAULT NULL, localisation8 VARCHAR(255) DEFAULT NULL, localisation9 VARCHAR(255) DEFAULT NULL, localisation10 VARCHAR(255) DEFAULT NULL, competence1 VARCHAR(255) NOT NULL, competence2 VARCHAR(255) NOT NULL, competence3 VARCHAR(255) NOT NULL, competence4 VARCHAR(255) NOT NULL, competence5 VARCHAR(255) DEFAULT NULL, competence6 VARCHAR(255) DEFAULT NULL, competence7 VARCHAR(255) DEFAULT NULL, competence8 VARCHAR(255) DEFAULT NULL, competence9 VARCHAR(255) DEFAULT NULL, competence10 VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE contenu');
        $this->addSql('DROP TABLE entreprise');
        $this->addSql('DROP TABLE galerie');
        $this->addSql('DROP TABLE partenaires');
        $this->addSql('DROP TABLE specificites');
    }
}
