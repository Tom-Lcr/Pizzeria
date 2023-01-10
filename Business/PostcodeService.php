<?php
//Business/PostcodeService.php
declare(strict_types = 1);

namespace Business;

use Data\PostcodeDAO;
use Entities\Postcode;

class PostcodeService {
    
	
    public function getOverzicht(): array {
        $postcodeDAO = new PostcodeDAO();
        $lijst = $postcodeDAO->getAll();
        return $lijst;
    }

    public function getLeverbaar(int $postcode) {
        $postcodeDAO = new PostcodeDAO();
        $leverbaar = $postcodeDAO->getLeverbaarByPostcode($postcode);
        return $leverbaar;
    }

    public function voegNieuwePostcodeToe(int $postcode, string $woonplaats) {
        $postcodeDAO = new postcodeDAO();
        $postcodeDAO->createPostCode($postcode, $woonplaats);
    }	

 
    public function haalPostCodeObjectOp(int $postcode, string $woonplaats) :? Postcode {
	$postcodeDAO = new PostcodeDAO();
	$postcodeObject = $postcodeDAO->getByPostCodeAndWoonPlaats($postcode, $woonplaats);
	return $postcodeObject;
    }

     
} 



