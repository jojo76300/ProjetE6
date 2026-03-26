<?php

namespace App\Triggers;

use Talleu\TriggerMapping\Contract\MySQLTriggerInterface;

class TriArchiveEntrepriseAjout implements MySQLTriggerInterface
{
    public static function getTrigger(): string
    {
        return <<<SQL
            CREATE TRIGGER Tri_Archive_Entreprise_Ajout AFTER INSERT ON entreprise FOR EACH ROW
                BEGIN
                    INSERT INTO archive_entreprise (id_entreprise, type, nom_new, adresse_new, ville_new, cp_new, contact_new, tel_new, email_new, date_changement)
                    VALUES (NEW.id, 'Ajout', NEW.nom, NEW.adresse, NEW.ville, NEW.cp, NEW.contact, NEW.tel, NEW.email, NOW());
                END
            SQL;
    }
}
