<?php
//Data/PostcodeDao
declare(strict_types = 1);

namespace Data;

use \PDO;
use Data\DBConfig;
use Entities\Postcode;



class PostcodeDAO {
    
	
    public function createPostCode(int $postcode, string $woonplaats) { 
	$sql = "insert into postcodes (postcode, woonplaats, leverbaar) values (:postcode, :woonplaats, :leverbaar)";
	$dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
	$stmt = $dbh->prepare($sql);
    if ($postcode >= 9000 && $postcode < 9100) {
        $leverbaar = 1;
    } else {
        $leverbaar = 0;
    }
    $stmt->execute(array(':postcode' => $postcode, ':woonplaats' => $woonplaats, ':leverbaar' => $leverbaar));	
	$postId = $dbh->lastInsertId();
	$dbh = null;
    if ($leverbaar === 1) {
        $leverbaar = true;
    } else {
        $leverbaar = false;
    }
    $postcodeObject = new Postcode((int)$postId, $postcode, $woonplaats, $leverbaar);
	return $postcodeObject;
    }

    public function getAll(): Array {
        $sql = "select postId, postcode, woonplaats, leverbaar from postcodes";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, 
			DBConfig::$DB_PASSWORD);  
        $resultSet = $dbh->query($sql);
        $lijst = array();
        foreach($resultSet as $rij){
        $postcode = new Postcode((int)$rij["postId"], (int)$rij["postcode"], $rij["woonplaats"], (bool) $rij["leverbaar"]);
            array_push($lijst, $postcode);
        }
        $dbh = null;
        return $lijst;
    }

    public function getLeverbaarByPostCode(int $postcode) : bool {
        $sql = "select leverbaar from postcodes where postcode = :postcode" ;
	$dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
	$stmt = $dbh->prepare($sql);
    $stmt->execute(array(':postcode' => $postcode));
	$resultaat = intval($stmt->fetch(PDO::FETCH_ASSOC));
	$dbh = null;
    if ($resultaat === 1) {
        $leverbaar = true;
    } else {
        $leverbaar = false;
    }
	return $leverbaar;
    }
	
    public function getByPostCodeAndWoonPlaats(int $postcode, string $woonplaats) :? Postcode {
    $sql = "select postId, postcode, woonplaats, leverbaar  
		from postcodes where postcode = :postcode and woonplaats = :woonplaats";
	$dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
	$stmt = $dbh->prepare($sql);
        $stmt->execute(array(':postcode' => $postcode, ':woonplaats' => $woonplaats ));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);	
     if (!$rij) {
		return null;
	} else {
		$postcodeObject = new Postcode((int)$rij["postId"], (int)$rij["postcode"], $rij["woonplaats"], (bool)$rij["leverbaar"]);			
        $dbh = null;
		return $postcodeObject;
	}
    }


    


}
