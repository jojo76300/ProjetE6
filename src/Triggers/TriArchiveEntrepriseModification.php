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
                    INSERT INTO archiveentreprise (identreprise, type, nomold, nomnew, adresseold, adressenew, villeold, villenew, cpold, cpnew, contactold, contactnew, telold, telnew, emailold, emailnew, datechangement)
                    VALUES (NEW.id, 'Modification', OLD.nom, NEW.nom, OLD.adresse, NEW.adresse, OLD.ville, NEW.ville, OLD.cp, NEW.cp, OLD.contact, NEW.contact, OLD.tel, NEW.tel, OLD.email, NEW.email, NOW());
                END
            SQL;
    }
}
