<?php
// Entities\Cart.php

declare(strict_types=1);

namespace Entities;

class Cart
{
	private int $prodid;
    private string $naam;
	private float $prijs;
	private int $aantal;
	private float $totaalprijs;
	
    public function __construct(
        int $prodid,
        string $naam,
		float $prijs,
        int $aantal = 0,
		float $totaalprijs = 0.0
    ) {
        $this->setProdid($prodid);
        $this->setNaam($naam);
		$this->setPrijs($prijs);
		$this->setAantal($aantal);
		$this->setTotaalprijs($totaalprijs);
    }

    public function getProdid(): int
    {
        return $this->prodid;
    }
    public function setProdid(int $prodid)
    {
        $this->prodid = $prodid;
    }

    public function getNaam(): string
    {
        return $this->naam;
    }	
	public function setNaam(string $naam)
    {
        $this->naam = $naam;
    }
	
    public function getPrijs(): float
    {
        return $this->prijs;
    }	
    public function setPrijs(float $prijs)
    {
        $this->prijs = $prijs;
    }	
		
    public function getAantal(): int
    {
        return $this->aantal;
    }	
    public function setAantal(int $aantal)
    {
        $this->aantal = $aantal;
    }	
	
    public function getTotaalprijs(): float
    {
        return $this->totaalprijs;
    }	
    public function setTotaalprijs(float $totaalprijs)
    {
        $this->totaalprijs = $totaalprijs;
    }		

}
