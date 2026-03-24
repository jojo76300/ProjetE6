<?php

namespace App\Triggers;

use Talleu\TriggerMapping\Contract\MySQLTriggerInterface;

class TriArchiveEntrepriseSuppression implements MySQLTriggerInterface
{
    public static function getTrigger(): string
    {
        return <<<SQL
            CREATE TRIGGER Tri_Archive_Entreprise_Suppression AFTER DELETE ON entreprise FOR EACH ROW
                BEGIN
                    INSERT INTO archiveentreprise (identreprise, type, nomold, adresseold, villeold, cpold, contactold, telold, emailold, datechangement)
                    VALUES (OLD.id, 'Suppression', OLD.nom, OLD.adresse, OLD.ville, OLD.cp, OLD.contact, OLD.tel, OLD.email, NOW());
                END
            SQL;
    }
}
