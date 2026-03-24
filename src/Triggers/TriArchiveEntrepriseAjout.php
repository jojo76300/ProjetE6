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
                    INSERT INTO archiveentreprise (identreprise, type, nomnew, adressenew, villenew, cpnew, contactnew, telnew, emailnew, datechangement)
                    VALUES (NEW.id, 'Ajout', NEW.nom, NEW.adresse, NEW.ville, NEW.cp, NEW.contact, NEW.tel, NEW.email, NOW());
                END
            SQL;
    }
}
