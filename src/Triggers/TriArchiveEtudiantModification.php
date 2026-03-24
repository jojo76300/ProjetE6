<?php

namespace App\Triggers;

use Talleu\TriggerMapping\Contract\MySQLTriggerInterface;

class TriArchiveEtudiantModification implements MySQLTriggerInterface
{
    public static function getTrigger(): string
    {
        return <<<SQL
            CREATE TRIGGER Tri_Archive_Etudiant_Modification AFTER UPDATE ON etudiant FOR EACH ROW
                BEGIN
                    INSERT INTO archiveetudiant (idetudiant, type, nomold, nomnew, prenomold, prenomnew, filiereold, filierenew, ann_promotionold, ann_promotionnew, is_archivedold, is_archivednew, datechangement)
                    VALUES (new.id, 'Modification', old.nom, new.nom, old.prenom, new.prenom, old.filiere, new.filiere, old.ann_promotion, new.ann_promotion, old.is_archived, new.is_archived, NOW());
                END
            SQL;
    }
}
