<?php

namespace App\Triggers;

use Talleu\TriggerMapping\Contract\MySQLTriggerInterface;

class TriHistoriqueEtudiantAjout implements MySQLTriggerInterface
{
    public static function getTrigger(): string
    {
        return <<<SQL
            CREATE TRIGGER Tri_Historique_Etudiant_Ajout AFTER INSERT ON etudiant FOR EACH ROW
                        BEGIN
                    INSERT INTO history (etudiantid, type, datechangement)
                    VALUES (new.id, 'Ajout', NOW());
                END        
        SQL;
        }
}
