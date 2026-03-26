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
                    INSERT INTO archive_etudiant (id_etudiant, type, nom_old, nom_new, prenom_old, prenom_new, filiere_old, filiere_new, ann_promotion_old, ann_promotion_new, is_archived_old, is_archived_new, date_changement)
                    VALUES (NEW.id, 'Modification', OLD.nom, NEW.nom, OLD.prenom, NEW.prenom, OLD.filiere, NEW.filiere, OLD.ann_promotion, NEW.ann_promotion, OLD.is_archived, NEW.is_archived, NOW());
                END
            SQL;
    }
}
