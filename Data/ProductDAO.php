<?php
//Data/KlantDAO
declare(strict_types = 1);

namespace Data;

use \PDO;
use Data\DBConfig;
use Entities\Product;


class ProductDAO {
    
    
    public function getAll(): Array {
        $sql = "select productId, naam, productinfo, prijs, promotieprijs from producten";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, 
			DBConfig::$DB_PASSWORD);  
        $resultSet = $dbh->query($sql);
        $lijst = array();
        foreach($resultSet as $rij){
            $product = new Product((int)$rij["productId"], $rij["naam"], $rij["productinfo"], (float)$rij["prijs"], (float)$rij["promotieprijs"]);
            array_push($lijst, $product);
        }
        $dbh = null;
        return $lijst;
    }

    public function getByProductId(int $productId) : Product {
    $sql = "select productId, naam, productinfo, prijs, promotieprijs from producten where productId = :productId" ;
	$dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
	$stmt = $dbh->prepare($sql);
    $stmt->execute(array(':productId' => $productId));
	$rij = $stmt->fetch(PDO::FETCH_ASSOC);
    $product = new Product((int)$rij["productId"], $rij["naam"], $rij["productinfo"], (float)$rij["prijs"], (float)$rij["promotieprijs"]);
	$dbh = null;
	return $product;
    }

   

}
