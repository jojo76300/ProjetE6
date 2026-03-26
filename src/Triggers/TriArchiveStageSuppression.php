<?php

namespace App\Triggers;

use Talleu\TriggerMapping\Contract\MySQLTriggerInterface;

class TriArchiveStageSuppression implements MySQLTriggerInterface
{
    public static function getTrigger(): string
    {
        return <<<SQL
            CREATE TRIGGER Tri_Archive_Stage_Suppression AFTER DELETE ON stage FOR EACH ROW
                BEGIN
                    INSERT INTO archive_stage (id_stage, type, date_debut_old, date_fin_old, entreprise_id_old, prof_suivi_id_old, prof_visite_id_old, etudiant_id_old, date_changement)
                    VALUES (OLD.id, 'Suppression', OLD.date_debut, OLD.date_fin, OLD.entreprise_id, OLD.prof_suivi_id, OLD.prof_visite_id, OLD.etudiant_id, NOW());
                END
            SQL;
    }
}
