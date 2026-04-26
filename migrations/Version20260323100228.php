<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260323100228 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE stage (id INT AUTO_INCREMENT NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, remarques LONGTEXT DEFAULT NULL, statut_attestation VARCHAR(20) DEFAULT \'Non saisi\' NOT NULL, etudiant_id INT NOT NULL, entreprise_id INT NOT NULL, INDEX IDX_C27C9369DDEAB1A3 (etudiant_id), INDEX IDX_C27C9369A4AEAFEA (entreprise_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE visite (id INT AUTO_INCREMENT NOT NULL, date_visite DATE NOT NULL, commentaires LONGTEXT DEFAULT NULL, stage_id INT NOT NULL, enseignant_visiteur_id INT NOT NULL, INDEX IDX_B09C8CBB2298D193 (stage_id), INDEX IDX_B09C8CBBED520701 (enseignant_visiteur_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C9369DDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C9369A4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id)');
        $this->addSql('ALTER TABLE visite ADD CONSTRAINT FK_B09C8CBB2298D193 FOREIGN KEY (stage_id) REFERENCES stage (id)');
        $this->addSql('ALTER TABLE visite ADD CONSTRAINT FK_B09C8CBBED520701 FOREIGN KEY (enseignant_visiteur_id) REFERENCES utilisateur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C9369DDEAB1A3');
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C9369A4AEAFEA');
        $this->addSql('ALTER TABLE visite DROP FOREIGN KEY FK_B09C8CBB2298D193');
        $this->addSql('ALTER TABLE visite DROP FOREIGN KEY FK_B09C8CBBED520701');
        $this->addSql('DROP TABLE stage');
        $this->addSql('DROP TABLE visite');
    }
}
