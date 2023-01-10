<?php
//Data/KlantDAO
declare(strict_types = 1);

namespace Data;

use \PDO;
use Data\DBConfig;
use Data\PostcodeDAO;
use Entities\Postcode;
use Entities\Klant;
use Exceptions\KlantBestaatNietException;
use Exceptions\WachtwoordIncorrectException;


class KlantDAO {
    
    
    public function getByEmailAndWachtwoord(string $email, string $wachtwoord) : ?Klant {

    $sql = "select klantId, naam, voornaam, straat, nummer, postcode, woonplaats, leverbaar, klanten.postId as postId, email, 
    wachtwoord, telefoonnummer, bemerkingen, promo from klanten, postcodes where email = :email and klanten.postId = postcodes.postId;" ;
	$dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
	$stmt = $dbh->prepare($sql);
    $stmt->execute(array(':email' => $email));
	$rij = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$rij) {
        throw new KlantBestaatNietException();
    }
   /*$isWachtwoordCorrect = password_verify($wachtwoord, $rij["wachtwoord"]);

    if (!$isWachtwoordCorrect) {
       throw new WachtwoordIncorrectException();
    }*/
    
	$postcode = new Postcode((int)$rij["postId"], (int)$rij["postcode"], $rij["woonplaats"], (bool)$rij["leverbaar"]);
	$klant = new Klant((int)$rij["klantId"], $rij["naam"], $rij["voornaam"], $rij["straat"], (int)$rij["nummer"], $postcode,
    $rij["email"], $rij["wachtwoord"], $rij["telefoonnummer"]);
	$dbh = null;
	return $klant;
    }

    public function getByTelefoonnummer(string $telefoonnummer):?Klant {
        $sql = "select klantId, naam, voornaam, straat, nummer, postcode, woonplaats, leverbaar, klanten.postId as postId, email, 
        wachtwoord, telefoonnummer, bemerkingen, promo from klanten, postcodes where telefoonnummer = :telefoonnummer and 
        klanten.postId = postcodes.postId;";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':telefoonnummer' => $telefoonnummer));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);	
        if (!$rij) {
            return null;
        } else {
            $postcode = new Postcode((int)$rij["postId"], (int)$rij["postcode"], $rij["woonplaats"], (bool)$rij["leverbaar"]);
            $klant = new Klant((int)$rij["klantId"], $rij["naam"], $rij["voornaam"], $rij["straat"], (int)$rij["nummer"], $postcode,
                $rij["email"], $rij["wachtwoord"], $rij["telefoonnummer"]);		
            $dbh = null;
            return $klant;
        }
    }

    public function getByKlantId(int $klantId):?Klant {
        $sql = "select klantId, naam, voornaam, straat, nummer, postcode, woonplaats, leverbaar, klanten.postId as postId, email, 
        wachtwoord, telefoonnummer, bemerkingen, promo from klanten, postcodes where klantId = :klantId and 
        klanten.postId = postcodes.postId;";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':klantId' => $klantId));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);	
        if (!$rij) {
            return null;
        } else {
            $postcode = new Postcode((int)$rij["postId"], (int)$rij["postcode"], $rij["woonplaats"], (bool)$rij["leverbaar"]);
            $klant = new Klant((int)$rij["klantId"], $rij["naam"], $rij["voornaam"], $rij["straat"], (int)$rij["nummer"], $postcode,
            $rij["email"], $rij["wachtwoord"], $rij["telefoonnummer"]);		
            $dbh = null;
            return $klant;
        }
    }
       

    public function createKlant(string $naam, string $voornaam, string $straat, int $nummer, 
    int $postcode, string $woonplaats, string $telefoonnummer, string $email, string $wachtwoord) {
        
        $bestaandeKlant = $this->getByTelefoonnummer($telefoonnummer);
        if (!is_null($bestaandeKlant)) {
            throw new KlantBestaatAlException();
        }
       $postcodeDAO = new PostcodeDAO();
       $postcode = $postcodeDAO->createPostCode($postcode, $woonplaats);
       $postId = $postcode->getPostId(); 
       $sql = "insert into klanten (naam, voornaam, straat, nummer, postId, telefoonnummer, email, wachtwoord) values (:naam, 
       :voornaam, :straat, :nummer, :postId, :telefoonnummer, :email, :wachtwoord)";
	   $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
	   $stmt = $dbh->prepare($sql);
       $stmt->execute(array(':naam' => $naam, ':voornaam' => $voornaam, ':straat' => $straat, ':nummer' => $nummer, 
       ':postId' => $postId, ':telefoonnummer' => $telefoonnummer, ':email' => $email, ':wachtwoord' => $wachtwoord));	
	   $klantId = $dbh->lastInsertId();
	   $dbh = null;
       $klant = new Klant((int)$klantId, $naam, $voornaam, $straat, (int)$nummer, $postcode, $email, $wachtwoord, $telefoonnummer);
	   return $klant;
    }
    
    
    public function updateAdres(int $klantId, string $straat, int $nummer, int $postcode, string $woonplaats) {
        $postcodedao = New PostcodeDAO();
        if (!is_null($postcodedao->getByPostCodeAndWoonPlaats($postcode, $woonplaats))) {
            $postcodeObject = $postcodedao->getByPostCodeAndWoonPlaats($postcode, $woonplaats);
        } else {
            $postcodeObject = $postcodedao->createPostCode($postcode, $woonplaats);
        }
        $postId = $postcodeObject->getPostId(); 
        $sql = "update klanten set straat = :straat, nummer = :nummer, postId = :postId where klantId = :klantId";
	    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME,DBConfig::$DB_PASSWORD);
	    $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':straat' => $straat, ':nummer' => $nummer, ':postId' => $postId, ':klantId' => $klantId));
	    $dbh = null;
     } 

}

