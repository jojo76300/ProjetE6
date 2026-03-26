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
                    INSERT INTO archive_entreprise (id_entreprise, type, nom_old, adresse_old, ville_old, cp_old, contact_old, tel_old, email_old, date_changement)
                    VALUES (OLD.id, 'Suppression', OLD.nom, OLD.adresse, OLD.ville, OLD.cp, OLD.contact, OLD.tel, OLD.email, NOW());
                END
            SQL;
    }
}
