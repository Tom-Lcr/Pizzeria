<?php
//Business/BestelRegelService.php
declare(strict_types = 1);

namespace Business;

use Data\BestelRegelDAO;
use Entities\BestelRegel;
use Entities\Bestelling;


class BestelRegelService {
    

    
    
    public function haalBestelRegelOp(int $bestelRegelId) : BestelRegel {
    $bestelregelDAO = new BestelRegelDAO();
    $bestelregel = $bestelregelDAO->getByBestelRegelId($bestelRegelId);
    return $bestelregel;
    }

    public function maakBestelRegel(Bestelling $bestelling, int $productId, int $aantal) {
    $bestelregelDAO = new BestelRegelDAO();
    $bestelregel = $bestelregelDAO->createBestelRegel($bestelling, $productId, $aantal);
    return $bestelregel;
    }	
        
	public function veranderBestelRegel(int $bestelRegelId, int $productId, int $aantal) {
    $bestelregelDAO = new BestelRegelDAO();
    $bestelregelDAO->updateBestelRegel($bestelRegelId, $productId, $aantal);
    }
         
} 
