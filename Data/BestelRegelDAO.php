<?php
//Data/BestelRegelDAO
declare(strict_types = 1);

namespace Data;

use \PDO;
use Data\DBConfig;
use Data\BestellingDAO;
use Data\ProductDAO;
use Entities\Bestelling;
use Entities\Product;
use Entities\BestelRegel;


class BestelRegelDAO {
    
    


    public function getByBestelRegelId(int $bestelRegelId) : BestelRegel  {
        $sql = "select bestelregelId, bestellingen.bestelId as bestelId, producten.productId as productId, aantal, klantId, 
        datumuur, totaalprijs, naam, productinfo, prijs, promotieprijs from bestelregels, bestellingen, producten where bestelregelId = 
        :bestelregelId and bestelregels.bestelId = bestellingen.bestelId and bestelregels.productId = producten.productId;";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':bestelRegelId' => $bestelRegelId));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);	
       /* if (!$rij) {
            return null;
        } else {*/
        $bestelling = new Bestelling((int)$rij["bestelId"], (int)$rij["klantId"], $rij["datumuur"], (float)$rij["totaalprijs"]);
        $product = new Product((int)$rij["productId"], $rij["naam"], (float)$rij["prijs"], (float)$rij["promotieprijs"]);
        $bestelRegel = new BestelRegel((int)$rij["bestelregelId"], $bestelling, $product, (int)$rij["aantal"]);		
        $dbh = null;
        return $bestelRegel;
        }
    
       

    public function createBestelRegel(Bestelling $bestelling, int $productId, int $aantal) {
        
       $bestelId = $bestelling->getBestelId();
       $productDAO = new ProductDAO();
       $product = $productDAO->getByProductId($productId);
       $sql = "insert into bestelregels (bestelId, productId, aantal) values (:bestelId, :productId, :aantal)";
	   $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
	   $stmt = $dbh->prepare($sql);
       $stmt->execute(array(':bestelId' => $bestelId, ':productId' => $productId, ':aantal' => $aantal));	
	   $bestelRegelId = $dbh->lastInsertId();
	   $dbh = null;
       $bestelRegel = new BestelRegel((int)$bestelRegelId, $bestelling, $product, (int)$aantal);
	   return $bestelRegel;
    }
    
    
    
    public function updateBestelRegel(int $bestelRegelId, int $productId, int $aantal) { 
        $sql = "update bestelregels set productId = :productId, aantal = :aantal where bestelRegelId = :bestelRegelId";
	    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME,DBConfig::$DB_PASSWORD);
	    $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':productId' => $productId, ':aantal' => $aantal));
	    $dbh = null;
     } 

    }