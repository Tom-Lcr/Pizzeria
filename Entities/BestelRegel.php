<?php
//Entities/BestelRegel.php
declare(strict_types = 1);

namespace Entities;

use Entities\Bestelling;
use Entities\Product;



class  BestelRegel {

    private $bestelregelId;
    private $bestelling;
    private $product;
    private $aantal;
   
    
    public function __construct(int $bestelregelId, Bestelling $bestelling, Product $product, int $aantal) {

        $this->bestelregelId = $bestelregelId;
        $this->bestelling = $bestelling;
        $this->product = $product;
        $this->aantal = $aantal;

    }
    
    
    public function getBestelRegelId(): int {
        return $this->bestelregelId;
    }

    public function getBestelling() : Bestelling {
        return $this->bestelling;
    }

    public function setBestelling(Bestelling $bestelling){
        $this->bestelling = $bestelling;
   }


    public function getProduct() : Product {
        return $this->product;
    }

    public function setProduct(Product $product){
        $this->product = $product;
   }

    public function getAantal() : int {
        return $this->aantal;
    }

    public function setAantal(int $aantal){
        $this->aantal = $aantal;
   }



    


}