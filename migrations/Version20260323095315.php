<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260323095315 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        // This migration get the trigger SQL by calling the static methods of your trigger class or reads the SQL from files.
        $this->addSql(\App\Triggers\TriArchiveEtudiantSuppression::getTrigger());
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        // Reverting this migration will drop the trigger and function.
        $this->addSql("DROP TRIGGER IF EXISTS Tri_Archive_Etudiant_Suppression;");
    }
}
