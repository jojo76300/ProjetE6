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
                    INSERT INTO archivestage (idstage, type, date_debutold, date_debutnew, date_finold, date_finnew, entreprise_idold, entreprise_idnew, prof_suivi_idold, prof_suivi_idnew, prof_visite_idold, prof_visite_idnew, etudiant_idold, etudiant_idnew, datechangement)
                    VALUES (NEW.id, 'Modification', OLD.date_debut, NEW.date_debut, OLD.date_fin, NEW.date_fin, OLD.entreprise_id, NEW.entreprise_id, OLD.prof_suivi_id, NEW.prof_suivi_id, OLD.prof_visite_id, NEW.prof_visite_id, OLD.etudiant_id, NEW.etudiant_id, NOW());
                END
            SQL;
    }
}
