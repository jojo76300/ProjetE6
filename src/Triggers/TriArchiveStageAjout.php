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
                    INSERT INTO archivestage (idstage, type, date_debutnew, date_finnew, entreprise_idnew, prof_suivi_idnew, prof_visite_idnew, etudiant_idnew, datechangement)
                    VALUES (new.id, 'Ajout', new.date_debut, new.date_fin, new.entreprise_id, new.prof_suivi_id, new.prof_visite_id, new.etudiant_id, NOW());
                END
            SQL;
    }
}
