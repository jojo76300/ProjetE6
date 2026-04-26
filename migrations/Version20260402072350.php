<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260402072350 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE promotion (id INT AUTO_INCREMENT NOT NULL, classe VARCHAR(50) NOT NULL, session VARCHAR(50) NOT NULL, date_debut_stage_defaut DATE NOT NULL, date_fin_stage_defaut DATE NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 (queue_name, available_at, delivered_at, id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE historique DROP FOREIGN KEY `FK_HISTORIQUE_AUTEUR`');
        $this->addSql('ALTER TABLE historique DROP FOREIGN KEY `FK_HISTORIQUE_STAGE`');
        $this->addSql('DROP TABLE archive_entreprise');
        $this->addSql('DROP TABLE archive_etudiant');
        $this->addSql('DROP TABLE archive_stage');
        $this->addSql('DROP TABLE historique');
        $this->addSql('DROP TABLE history');
        $this->addSql('DROP TABLE statut_dossier');
        $this->addSql('ALTER TABLE affectation DROP FOREIGN KEY `FK_AFFECT_ENSEIGNANT`');
        $this->addSql('ALTER TABLE affectation DROP FOREIGN KEY `FK_AFFECT_STAGE`');
        $this->addSql('ALTER TABLE affectation ADD CONSTRAINT FK_F4DD61D32298D193 FOREIGN KEY (stage_id) REFERENCES stage (id)');
        $this->addSql('ALTER TABLE affectation ADD CONSTRAINT FK_F4DD61D3E455FCC0 FOREIGN KEY (enseignant_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE affectation RENAME INDEX idx_affect_stage TO IDX_F4DD61D32298D193');
        $this->addSql('ALTER TABLE affectation RENAME INDEX idx_affect_enseignant TO IDX_F4DD61D3E455FCC0');
        $this->addSql('ALTER TABLE avoir ADD CONSTRAINT FK_659B1A43FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE avoir ADD CONSTRAINT FK_659B1A43D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE etudiant ADD promotion_id INT NOT NULL');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E3139DF194 FOREIGN KEY (promotion_id) REFERENCES promotion (id)');
        $this->addSql('CREATE INDEX IDX_717E22E3139DF194 ON etudiant (promotion_id)');
        $this->addSql('ALTER TABLE role CHANGE libelle_symfony libelle_symfony VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY `FK_STAGE_PROF_SUIVI`');
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY `FK_STAGE_PROF_VISITE`');
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY `FK_STAGE_STATUT_DOSSIER`');
        $this->addSql('DROP INDEX IDX_STAGE_STATUT_DOSSIER ON stage');
        $this->addSql('ALTER TABLE stage DROP statut_dossier_id');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C9369D5073BAA FOREIGN KEY (prof_suivi_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C93696C08B97D FOREIGN KEY (prof_visite_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE stage RENAME INDEX idx_stage_prof_suivi TO IDX_C27C9369D5073BAA');
        $this->addSql('ALTER TABLE stage RENAME INDEX idx_stage_prof_visite TO IDX_C27C93696C08B97D');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE archive_entreprise (id INT AUTO_INCREMENT NOT NULL, id_entreprise INT NOT NULL, type VARCHAR(12) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, nom_old VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, nom_new VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, adresse_old VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, adresse_new VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, ville_old VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, ville_new VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, cp_old VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, cp_new VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, contact_old VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, contact_new VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, tel_old VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, tel_new VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, email_old VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, email_new VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, date_changement DATETIME NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE archive_etudiant (id INT AUTO_INCREMENT NOT NULL, id_etudiant INT NOT NULL, type VARCHAR(12) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, nom_old VARCHAR(38) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, nom_new VARCHAR(38) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, prenom_old VARCHAR(38) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, prenom_new VARCHAR(38) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, filiere_old VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, filiere_new VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, ann_promotion_old VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, ann_promotion_new VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, is_archived_old TINYINT NOT NULL, is_archived_new TINYINT NOT NULL, date_changement DATETIME NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE archive_stage (id INT AUTO_INCREMENT NOT NULL, id_stage INT NOT NULL, type VARCHAR(12) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, date_debut_old DATE NOT NULL, date_debut_new DATE NOT NULL, date_fin_old DATE NOT NULL, date_fin_new DATE NOT NULL, entreprise_id_old INT NOT NULL, entreprise_id_new INT NOT NULL, prof_suivi_id_old INT NOT NULL, prof_suivi_id_new INT NOT NULL, prof_visite_id_old INT NOT NULL, prof_visite_id_new INT NOT NULL, etudiant_id_old INT NOT NULL, etudiant_id_new INT NOT NULL, date_changement DATETIME NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE historique (id INT AUTO_INCREMENT NOT NULL, date_heure DATETIME NOT NULL, type_changement VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, champ_modifie VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ancienne_valeur TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, nouvelle_valeur TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, stage_id INT NOT NULL, auteur_id INT NOT NULL, INDEX IDX_HISTORIQUE_AUTEUR (auteur_id), INDEX IDX_HISTORIQUE_STAGE (stage_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE history (id INT AUTO_INCREMENT NOT NULL, idarchiveetudiant INT DEFAULT NULL, idarchiveentreprise INT DEFAULT NULL, idarchivestage INT DEFAULT NULL, INDEX FK_HistoriqueEntreprise (idarchiveentreprise), INDEX FK_HistoriqueEtudiant (idarchiveetudiant), INDEX FK_HistoriqueStage (idarchivestage), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE statut_dossier (id INT AUTO_INCREMENT NOT NULL, remerciement VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, bilan_suivi VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, jury VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, attestation VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, commentaire_global TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE historique ADD CONSTRAINT `FK_HISTORIQUE_AUTEUR` FOREIGN KEY (auteur_id) REFERENCES utilisateur (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE historique ADD CONSTRAINT `FK_HISTORIQUE_STAGE` FOREIGN KEY (stage_id) REFERENCES stage (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('DROP TABLE promotion');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE affectation DROP FOREIGN KEY FK_F4DD61D32298D193');
        $this->addSql('ALTER TABLE affectation DROP FOREIGN KEY FK_F4DD61D3E455FCC0');
        $this->addSql('ALTER TABLE affectation ADD CONSTRAINT `FK_AFFECT_ENSEIGNANT` FOREIGN KEY (enseignant_id) REFERENCES utilisateur (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE affectation ADD CONSTRAINT `FK_AFFECT_STAGE` FOREIGN KEY (stage_id) REFERENCES stage (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE affectation RENAME INDEX idx_f4dd61d3e455fcc0 TO IDX_AFFECT_ENSEIGNANT');
        $this->addSql('ALTER TABLE affectation RENAME INDEX idx_f4dd61d32298d193 TO IDX_AFFECT_STAGE');
        $this->addSql('ALTER TABLE avoir DROP FOREIGN KEY FK_659B1A43FB88E14F');
        $this->addSql('ALTER TABLE avoir DROP FOREIGN KEY FK_659B1A43D60322AC');
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E3139DF194');
        $this->addSql('DROP INDEX IDX_717E22E3139DF194 ON etudiant');
        $this->addSql('ALTER TABLE etudiant DROP promotion_id');
        $this->addSql('ALTER TABLE role CHANGE libelle_symfony libelle_symfony VARCHAR(50) DEFAULT \'ROLE_USER\' NOT NULL');
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C9369D5073BAA');
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C93696C08B97D');
        $this->addSql('ALTER TABLE stage ADD statut_dossier_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT `FK_STAGE_PROF_SUIVI` FOREIGN KEY (prof_suivi_id) REFERENCES utilisateur (id) ON UPDATE NO ACTION ON DELETE SET NULL');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT `FK_STAGE_PROF_VISITE` FOREIGN KEY (prof_visite_id) REFERENCES utilisateur (id) ON UPDATE NO ACTION ON DELETE SET NULL');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT `FK_STAGE_STATUT_DOSSIER` FOREIGN KEY (statut_dossier_id) REFERENCES statut_dossier (id) ON UPDATE NO ACTION ON DELETE SET NULL');
        $this->addSql('CREATE INDEX IDX_STAGE_STATUT_DOSSIER ON stage (statut_dossier_id)');
        $this->addSql('ALTER TABLE stage RENAME INDEX idx_c27c9369d5073baa TO IDX_STAGE_PROF_SUIVI');
        $this->addSql('ALTER TABLE stage RENAME INDEX idx_c27c93696c08b97d TO IDX_STAGE_PROF_VISITE');
    }
}
