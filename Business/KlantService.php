<?php
//Business/PostcodeService.php
declare(strict_types = 1);

namespace Business;

use Data\KlantDAO;
use Entities\Klant;


class KlantService {
    

    public function loginKlant(string $email, string $wachtwoord) : ?Klant {
        $klantDAO = new KlantDAO();
        $klant = $klantDAO->getByEmailAndWachtwoord($email, $wachtwoord);
        return $klant;
        }
    
    public function haalKlantOp(int $klantId) :? Klant {
    $klantDAO = new KlantDAO();
    $klant = $klantDAO->getByKlantId($klantId);
    return $klant;
    }

    public function haalKlantOpTelefoonnummer(string $telefoonnummer) :? Klant {
        $klantDAO = new KlantDAO();
        $klant = $klantDAO->getByTelefoonnummer($telefoonnummer);
        return $klant;
        }

    public function maakNieuweKlantAan(string $naam, string $voornaam, string $straat, int $nummer, 
        int $postcode, string $woonplaats, string $telefoonnummer, string $email, string $wachtwoord) {
    $klantDAO = new KlantDAO();
    $klantDAO->createKlant($naam, $voornaam, $straat, $nummer, $postcode, $woonplaats, $telefoonnummer, $email, $wachtwoord);
        }	
        
	public function veranderAdres(int $klantId, string $straat, int $nummer, int $postcode, string $woonplaats) {
    $klantDAO = new KlantDAO();
    $klantDAO->updateAdres($klantId, $straat, $nummer, $postcode, $woonplaats);
    }
         
} 

