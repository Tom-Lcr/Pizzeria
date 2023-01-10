<?php
//toonpizzas.php
declare(strict_types = 1);

spl_autoload_register();

session_start();




use Business\KlantService;
use Business\BestellingService;
use Business\BestelRegelService;
use Business\ProductService;
use Data\BestellingDAO;
use Entities\Bestelling;

//unset($_SESSION["klantAccount"]);

if (isset($_GET["action"]) && ($_GET["action"] === "change")) {
  //try {
     $klantSvc = new KlantService();
     $klant = unserialize($_SESSION["klantAccount"]);
	 $klantSvc->veranderAdres($klant->getKlantId(), $_POST["Straat"], (int)$_POST["Nummer"], (int)$_POST["Postcode"], $_POST["Woonplaats"]);
     $nieuweKlant = $klantSvc->haalKlantOp($klant->getKlantId());
     $_SESSION["klantAccount"] = serialize($nieuweKlant);
}



include("presentation/bestellingOverzicht.php");	



   