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
                    INSERT INTO archive_etudiant (id_etudiant, type, nom_new, prenom_new, filiere_new, ann_promotion_new, is_archived_new, date_changement)
                    VALUES (NEW.id, 'Ajout', NEW.nom, NEW.prenom, NEW.filiere, NEW.ann_promotion, NEW.is_archived, NOW());
                END
            SQL;
    }
}
