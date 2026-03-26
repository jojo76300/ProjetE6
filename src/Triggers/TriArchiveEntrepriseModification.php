<?php

namespace App\Triggers;

use Talleu\TriggerMapping\Contract\MySQLTriggerInterface;

class TriArchiveEntrepriseModification implements MySQLTriggerInterface
{
    public static function getTrigger(): string
    {
        return <<<SQL
            CREATE TRIGGER Tri_Archive_Entreprise_Modification AFTER UPDATE ON entreprise FOR EACH ROW
                BEGIN
                    INSERT INTO archive_entreprise (id_entreprise, type, nom_old, nom_new, adresse_old, adresse_new, ville_old, ville_new, cp_old, cp_new, contact_old, contact_new, tel_old, tel_new, email_old, email_new, date_changement)
                    VALUES (NEW.id, 'Modification', OLD.nom, NEW.nom, OLD.adresse, NEW.adresse, OLD.ville, NEW.ville, OLD.cp, NEW.cp, OLD.contact, NEW.contact, OLD.tel, NEW.tel, OLD.email, NEW.email, NOW());
                END
            SQL;
    }
}
