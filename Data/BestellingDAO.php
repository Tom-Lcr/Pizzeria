<?php
//Data/BestelRegelDAO
declare(strict_types = 1);

namespace Data;

use \PDO;
use Data\DBConfig;
use Entities\Bestelling;


class BestellingDAO {
    
    


    public function getByBestelId(int $bestelId) : Bestelling {
        $sql = "select bestelId, klantId, datumuur, totaalprijs from bestellingen where bestelId = 
        :bestelId;";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':bestelId' => $bestelId));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);	
        $bestelling = new Bestelling((int)$rij["bestelId"], (int)$rij["klantId"], $rij["datumuur"], (float)$rij["totaalprijs"]);	
        $dbh = null;
        return $bestelling;
        }
    
       

    public function createBestelling(int $klantId, string $datumuur, float $totaalprijs) {
        
       $sql = "insert into bestellingen (klantId, datumuur, totaalprijs) values (:klantId, :datumuur, :totaalprijs)";
	   $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
	   $stmt = $dbh->prepare($sql);
       $stmt->execute(array(':klantId' => $klantId, ':datumuur' => $datumuur, ':totaalprijs' => $totaalprijs));	
	   $bestelId = $dbh->lastInsertId();
	   $dbh = null;
       $bestelling = new Bestelling((int)$bestelId, (int)$klantId, (string)$datumuur, (float)$totaalprijs);
	   return $bestelling;
    }

    public function getBestelId() {
        $sql = "select bestelId where bestelId = 
        :bestelId;";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':bestelId' => $dbh->lastInsertId()));
        $bestelId = $dbh->lastInsertId();	
        $dbh = null;
        return $bestelId;
    }
    
    
    
    public function updateBestelling(int $bestelId, float $totaalprijs) { 
        $sql = "update bestellingen set totaalprijs = :totaalprijs where bestelId = :bestelId";
	    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME,DBConfig::$DB_PASSWORD);
	    $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':totaalprijs' => $totaalprijs));
	    $dbh = null;
     } 

    } 




