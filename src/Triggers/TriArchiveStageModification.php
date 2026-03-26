<?php

namespace App\Triggers;

use Talleu\TriggerMapping\Contract\MySQLTriggerInterface;

class TriArchiveStageModification implements MySQLTriggerInterface
{
    public static function getTrigger(): string
    {
        return <<<SQL
            CREATE TRIGGER Tri_Archive_Stage_Modification AFTER UPDATE ON stage FOR EACH ROW
                BEGIN
                    INSERT INTO archive_stage (id_stage, type, date_debut_old, date_debut_new, date_fin_old, date_fin_new, entreprise_id_old, entreprise_id_new, prof_suivi_id_old, prof_suivi_id_new, prof_visite_id_old, prof_visite_id_new, etudiant_id_old, etudiant_id_new, date_changement)
                    VALUES (NEW.id, 'Modification', OLD.date_debut, NEW.date_debut, OLD.date_fin, NEW.date_fin, OLD.entreprise_id, NEW.entreprise_id, OLD.prof_suivi_id, NEW.prof_suivi_id, OLD.prof_visite_id, NEW.prof_visite_id, OLD.etudiant_id, NEW.etudiant_id, NOW());
                END
            SQL;
    }
}
