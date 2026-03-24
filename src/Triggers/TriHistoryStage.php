<?php

namespace App\Triggers;

use Talleu\TriggerMapping\Contract\MySQLTriggerInterface;

class TriHistoryStage implements MySQLTriggerInterface
{
    public static function getTrigger(): string
    {
        return <<<SQL
            CREATE TRIGGER Tri_History_Stage AFTER INSERT ON archivestage FOR EACH ROW
                BEGIN
                    INSERT INTO history (idarchivestage)
                    VALUES (new.id);
                END
            SQL;
    }
}
