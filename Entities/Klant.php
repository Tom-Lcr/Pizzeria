<?php
//Entities/Klant.php
declare(strict_types = 1);

namespace Entities;

use Entities\Postcode;



class  Klant {

    private $klantId;
    private $naam;
    private $voornaam;
    private $straat;
    private $nummer;
    private $postcode;
    private $email;
    private $wachtwoord;
    private $bemerkingen;
    private $promo;
    private $telefoonnummer;
    
    public function __construct(int $klantId, string $naam, string $voornaam, string $straat, int $nummer, Postcode $postcode, 
    string $email, string $wachtwoord, string $telefoonnummer) {

        $this->klantId = $klantId;
        $this->naam = $naam;
        $this->voornaam = $voornaam;
        $this->straat = $straat;
        $this->nummer = $nummer;
        $this->postcode = $postcode;
        $this->setEmail($email);
        $this->setWachtwoord($wachtwoord);
        //$this->email = $email;
        //$this->wachtwoord = $wachtwoord;
        $this->telefoonnumer = $telefoonnummer;
    }
    
    
    public function getKlantId(): int {
        return $this->klantId;
    }

    
    public function getNaam() : string{
        return $this->naam;
    }

    public function setNaam(string $naam){
        $this->naam = $naam;
   }

    public function getVoorNaam() : string{
        return $this->voornaam;
    }

    public function setVoorNaam(string $voornaam){
        $this->voornaam = $voornaam;
   }

    public function getStraat() : string{
        return $this->straat;
    }

    public function setStraat(string $straat){
        $this->straat = $straat;
   }

    public function getNummer(): int {
        return $this->nummer;
    }

    public function setNummer(int $nummer){
        $this->nummer = $nummer;
   }
    
    public function getPostCode() : Postcode{
        return $this->postcode;
    }

    public function setPostCode(Postcode $postcode){
        $this->postcode = $postcode;
   }

   public function getEmail() : string {
    return $this->email;
}

public function setEmail(string $email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new OngeldigEmailadresException();
        }
    $this->email = $email;
}

public function getWachtWoord() : string{
    return $this->wachtwoord;
}

public function setWachtWoord(string $wachtwoord) {
   /* if ($wachtwoord !== $herhaalwachtwoord) {
        throw new WachtwoordenKomenNietOvereenException();
        }*/
        $this->wachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);
    }

   /* public function setWachtWoord(string $wachtwoord, string $herhaalwachtwoord) {
        if ($wachtwoord !== $herhaalwachtwoord) {
            throw new WachtwoordenKomenNietOvereenException();
            }
            $this->wachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);
        }*/
    


    public function getBemerkingen() : string{
        return $this->bemerkingen;
    }

    public function setBemerkingen(string $bemerkingen){
        $this->bemerkingen = $bemerkingen;
   }
    
    public function getPromo() : bool {
        return $this->promo;
    }

    public function setPromo(bool $promo){
        $this->promo = $promo;
   }

    public function getTelefoonNummer(): string {
        return $this->telefoonnummer;
    }

    public function setTelefoonNummer(string $telefoonnummer){
        $this->telefoonnummer = $telefoonnummer;
   }




}


