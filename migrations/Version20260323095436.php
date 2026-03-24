<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260323095436 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE entreprise (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, ville VARCHAR(100) NOT NULL, cp VARCHAR(10) NOT NULL, contact VARCHAR(255) DEFAULT NULL, tel VARCHAR(20) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE stage (id INT AUTO_INCREMENT NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, entreprise_id INT NOT NULL, prof_suivi_id INT NOT NULL, prof_visite_id INT NOT NULL, INDEX IDX_C27C9369A4AEAFEA (entreprise_id), INDEX IDX_C27C9369D5073BAA (prof_suivi_id), INDEX IDX_C27C93696C08B97D (prof_visite_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C9369A4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id)');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C9369D5073BAA FOREIGN KEY (prof_suivi_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C93696C08B97D FOREIGN KEY (prof_visite_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE etudiant DROP is_archived');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C9369A4AEAFEA');
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C9369D5073BAA');
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C93696C08B97D');
        $this->addSql('DROP TABLE entreprise');
        $this->addSql('DROP TABLE stage');
        $this->addSql('ALTER TABLE etudiant ADD is_archived TINYINT NOT NULL');
    }
}
