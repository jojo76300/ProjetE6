<?php

namespace App\Triggers;

use Talleu\TriggerMapping\Contract\MySQLTriggerInterface;

class TriArchiveStageAjout implements MySQLTriggerInterface
{
    public static function getTrigger(): string
    {
        return <<<SQL
            CREATE TRIGGER Tri_Archive_Stage_Ajout AFTER INSERT ON stage FOR EACH ROW
                BEGIN
                    INSERT INTO archive_stage (id_stage, type, date_debut_new, date_fin_new, entreprise_id_new, prof_suivi_id_new, prof_visite_id_new, etudiant_id_new, date_changement)
                    VALUES (NEW.id, 'Ajout', NEW.date_debut, NEW.date_fin, NEW.entreprise_id, NEW.prof_suivi_id, NEW.prof_visite_id, NEW.etudiant_id, NOW());
                END
            SQL;
    }
}
