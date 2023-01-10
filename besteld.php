<?php
//besteld.php
declare(strict_types = 1);

spl_autoload_register();

session_start();




use Business\KlantService;
use Business\BestellingService;
use Business\BestelRegelService;
use Business\ProductService;
use Data\BestellingDAO;
use Entities\Bestelling;



if (isset($_GET["action"]) && ($_GET["action"] === "bestel")) {

if (isset($_SESSION["cart"])) {
  $cartitems = unserialize($_SESSION["cart"]);


     foreach ($cartitems as $item) {	
     $productId = $item->getProdId();
     $aantal = $item->getAantal();
     $totaalprijs = $item->getTotaalprijs(); 
}

$bestellingSvc = New BestellingService();
$klant = unserialize($_SESSION["klantAccount"]);
$today = date("Y-m-d H:i:s");
$bestelling = $bestellingSvc->maakBestelling($klant->getKlantId(), $today, $totaalprijs);
$bestelregelSvc = new BestelRegelService();
$bestelregel = $bestelregelSvc->maakBestelRegel($bestelling, $productId, $aantal);
$bestelregelId = $bestelregel->getBestelRegelId();

}




}

include("presentation/besteld.php");