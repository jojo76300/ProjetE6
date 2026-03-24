<?php

namespace App\Triggers;

use Talleu\TriggerMapping\Contract\MySQLTriggerInterface;

class TriArchiveEtudiantAjout implements MySQLTriggerInterface
{
    public static function getTrigger(): string
    {
        return <<<SQL
            CREATE TRIGGER Tri_Archive_Etudiant_Ajout AFTER INSERT ON etudiant FOR EACH ROW
                BEGIN
                    INSERT INTO archiveetudiant (idetudiant, type, nomnew, prenomnew, filierenew, ann_promotionnew, is_archivednew, datechangement)
                    VALUES (new.id, 'Ajout', new.nom, new.prenom, new.filiere, new.ann_promotion, new.is_archived, NOW());
                END
            SQL;
    }
}
