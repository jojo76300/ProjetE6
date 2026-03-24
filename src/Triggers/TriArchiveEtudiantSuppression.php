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
                    INSERT INTO archiveetudiant (idetudiant, type, nomold, prenomold, filiereold, ann_promotionold, is_archivedold, datechangement)
                    VALUES (old.id, 'Suppression', old.nom, old.prenom, old.filiere, old.ann_promotion, old.is_archived, NOW());
                END
            SQL;
    }
}
