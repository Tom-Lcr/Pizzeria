<?php
//Entities/Product.php
declare(strict_types = 1);

namespace Entities;

class  Product {

    private $productId;
    private $naam;
    private $productinfo;
    private $prijs;
    private $promotieprijs;
   
    
    public function __construct(int $productId, string $naam, string $productinfo, float $prijs, float $promotieprijs) {

        $this->productId = $productId;
        $this->naam = $naam;
        $this->productinfo = $productinfo;
        $this->prijs = $prijs;
        $this->promotieprijs = $promotieprijs;
    }
    
    
    public function getProductId(): int {
        return $this->productId;
    }

    public function getNaam() : string {
        return $this->naam;
    }

    public function setNaam(string $naam){
        $this->naam = $naam;
   }

    public function getPrijs() : float {
        return $this->prijs;
    }

    public function setPrijs(float $prijs){
        $this->prijs = $prijs;
   }

    public function getPromotiePrijs() : float {
        return $this->promotieprijs;
    }

    public function setPromotiePrijs(float $promotieprijs){
        $this->promotieprijs = $promotieprijs;
   }

    public function getProductInfo() : string{
        return $this->productinfo;
    }

    public function setProductInfo(string $productinfo){
        $this->productinfo = $productinfo;
   }


   
    


}