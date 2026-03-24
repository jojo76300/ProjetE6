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
                    INSERT INTO archivestage (idstage, type, date_debutold, date_finold, entreprise_idold, prof_suivi_idold, prof_visite_idold, etudiant_idold, datechangement)
                    VALUES (OLD.id, 'Suppression', OLD.date_debut, OLD.date_fin, OLD.entreprise_id, OLD.prof_suivi_id, OLD.prof_visite_id, OLD.etudiant_id, NOW());
                END
            SQL;
    }
}
