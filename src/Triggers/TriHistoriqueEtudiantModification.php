<?php

namespace App\Triggers;

use Talleu\TriggerMapping\Contract\MySQLTriggerInterface;

class TriHistoriqueEtudiantModification implements MySQLTriggerInterface
{
    public static function getTrigger(): string
    {
        return <<<SQL
            CREATE TRIGGER Tri_Historique_Etudiant_Modification AFTER UPDATE ON etudiant FOR EACH ROW
                BEGIN
                    INSERT INTO history (etudiantid, type, datechangement)
                    VALUES (new.id, 'Modification', NOW());
                END
            SQL;
    }
}
