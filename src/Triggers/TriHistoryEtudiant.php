<?php

namespace App\Triggers;

use Talleu\TriggerMapping\Contract\MySQLTriggerInterface;

class TriHistoryEtudiant implements MySQLTriggerInterface
{
    public static function getTrigger(): string
    {
        return <<<SQL
            CREATE TRIGGER Tri_History_Etudiant AFTER INSERT ON archiveetudiant FOR EACH ROW
                BEGIN
                    INSERT INTO history (idarchiveetudiant)
                    VALUES (new.id);
                END
            SQL;
    }
}
