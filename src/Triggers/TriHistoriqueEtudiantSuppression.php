<?php

namespace App\Triggers;

use Talleu\TriggerMapping\Contract\MySQLTriggerInterface;

class TriHistoriqueEtudiantSuppression implements MySQLTriggerInterface
{
    public static function getTrigger(): string
    {
        return <<<SQL
            CREATE TRIGGER Tri_Historique_Etudiant_Suppression AFTER DELETE ON etudiant FOR EACH ROW
                BEGIN
                    INSERT INTO history (etudiantid, type, datechangement)
                    VALUES (old.id, 'Suppression', NOW());
                END
            SQL;
    }
}
