<?php
//Entities/Postcode.php
declare(strict_types = 1);

namespace Entities;

class  Postcode {

    private $postId;
    private $postcode;
    private $woonplaats;
    private $leverbaar;
    
    public function __construct(int $postId, int $postcode, string $woonplaats, bool $leverbaar){
        $this->postId = $postId;
        $this->postcode = $postcode;
        $this->woonplaats = $woonplaats;
        $this->leverbaar = $leverbaar;
    }
    
    
    public function getPostId(): int {
        return $this->postId;
    }
    
    public function getPostCode() : int{
        return $this->postcode;
    }

    public function getWoonPlaats() : string{
        return $this->woonplaats;
    }

    public function getLeverbaar() : bool {
        return $this->leverbaar;
    }

    public function setPostCode(int $postcode){
        $this->postcode = $postcode;
   }

   public function setWoonPlaats(string $woonplaats){
    $this->woonplaats = $woonplaats;
  }

   public function setLeverbaar(bool $leverbaar){
    $this->leverbaar = $leverbaar;
  }



}
