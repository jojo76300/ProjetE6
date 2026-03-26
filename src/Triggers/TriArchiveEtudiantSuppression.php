<?php

namespace App\Triggers;

use Talleu\TriggerMapping\Contract\MySQLTriggerInterface;

class TriArchiveEtudiantSuppression implements MySQLTriggerInterface
{
    public static function getTrigger(): string
    {
        return <<<SQL
            CREATE TRIGGER Tri_Archive_Etudiant_Suppression AFTER DELETE ON etudiant FOR EACH ROW
                BEGIN
                    INSERT INTO archive_etudiant (id_etudiant, type, nom_old, prenom_old, filiere_old, ann_promotion_old, is_archived_old, date_changement)
                    VALUES (OLD.id, 'Suppression', OLD.nom, OLD.prenom, OLD.filiere, OLD.ann_promotion, OLD.is_archived, NOW());
                END
            SQL;
    }
}
