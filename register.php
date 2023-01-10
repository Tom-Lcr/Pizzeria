<?php
//toonpizzas.php
declare(strict_types = 1);

spl_autoload_register();

session_start();


use Business\KlantService;



if (isset($_GET["action"]) && ($_GET["action"] === "aanmaken")) {
  //try {
     $klantSvc = new KlantService();
     //$klant = unserialize($_SESSION["klantAccount"]);
	 $klantSvc->maakNieuweKlantAan($_POST["Naam"], $_POST["Voornaam"], $_POST["Straat"], (int)$_POST["Nummer"], 
     (int)$_POST["Postcode"], $_POST["Woonplaats"], $_POST["Telefoonnummer"], $_POST["Email"], $_POST["Wachtwoord"]);
     $klant = $klantSvc->haalKlantOpTelefoonnummer($_POST["Telefoonnummer"]);
     $_SESSION["klantAccount"] = serialize($klant);
     setcookie("Email", $_POST["Email"]);
     header("location: toonbestelling.php");

}


include("presentation/register.php");	


