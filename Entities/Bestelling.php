<?php
//Entities/Bestelling.php
declare(strict_types = 1);


namespace Entities;

class  Bestelling {

    private $bestelId;
    private $klantId;
    private $datumuur;
    private $totaalprijs;
   
    
    public function __construct(int $bestelId, int $klantId, string $datumuur, float $totaalprijs) {

        $this->bestelId = $bestelId;
        $this->klantId = $klantId;
        $this->datumuur = $datumuur;
        $this->totaalprijs = $totaalprijs;
    }
    
    
    public function getBestelId(): int {
        return $this->bestelId;
    }

    public function getKlantId() : int{
        return $this->klantId;
    }

    public function getDatumUur() : string{
        return $this->datumuur;
    }

    public function getTotaalPrijs() : float{
        return $this->totaalprijs;
    }

    public function setTotaalPrijs(float $totaalprijs){
        $this->totaalprijs = $totaalprijs;
   }

    


}