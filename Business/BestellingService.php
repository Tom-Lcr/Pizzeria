<?php
//Business/BestellingService.php
declare(strict_types = 1);

namespace Business;

use Data\BestellingDAO;
use Entities\Bestelling;


class BestellingService {
    

    
    
    public function haalBestellingOp(int $bestelId) : Bestelling {
    $bestellingDAO = new BestellingDAO();
    $bestelling = $bestellingDAO->getByBestelId($bestelId);
    return $bestelling;
    }

    public function maakBestelling(int $klantId, string $datumuur, float $totaalprijs) {
    $bestellingDAO = new BestellingDAO();
    $bestelling = $bestellingDAO->createBestelling($klantId, $datumuur, $totaalprijs);
    return $bestelling;
    }	
        
	public function veranderBestelling(int $bestelId, float $totaalprijs) {
    $bestellingDAO = new BestellingDAO();
    $bestellingDAO->updateBestelling($bestelId, $totaalprijs);
    }

    public function getBestelId() {
        $bestellingDAO = new BestellingDAO();
        $bestelId = $bestellingDAO->getBestelId();
        return $bestelId;
    }
    
         
} 
