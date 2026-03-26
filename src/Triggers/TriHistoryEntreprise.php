<?php

namespace App\Triggers;

use Talleu\TriggerMapping\Contract\MySQLTriggerInterface;

class TriHistoryEntreprise implements MySQLTriggerInterface
{
    public static function getTrigger(): string
    {
        return <<<SQL
            CREATE TRIGGER Tri_History_Entreprise AFTER INSERT ON archive_entreprise FOR EACH ROW
                BEGIN
                    INSERT INTO history (idarchiveentreprise)
                    VALUES (new.id);
                END
            SQL;
    }
}
