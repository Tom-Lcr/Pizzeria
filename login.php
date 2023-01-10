<?php

declare(strict_types=1);

spl_autoload_register();



session_start();



use Business\KlantService;
use Exceptions\KlantBestaatNietException;
use Exceptions\WachtwoordIncorrectException;

if (isset($_SESSION["klantAccount"])) {
    header("location: toonbestelling.php");
}

$error = "";
if (isset($_GET["action"]) && ($_GET["action"]) === "process") {
    $email = $_POST["email"];
    $wachtwoord = $_POST['wachtwoord'];

    $klantService = new KlantService();
    try {
       // if (isset($_COOKIE['Email'])) {
           // $klantAccount = $klantService->loginKlant($_COOKIE['Email'], $wachtwoord); 
       // } else {
            $klantAccount = $klantService->loginKlant($email, $wachtwoord);
            setcookie("Email", $email);
       // }
        //$klantAccount = $klantService->loginKlant($email, $wachtwoord);
        //setcookie("Email", $email);
        $_SESSION["klantAccount"] = serialize($klantAccount);
        header("location: toonbestelling.php");
    } catch (KlantBestaatNietException $e) {
        $error = "Gebruiker kan niet gevonden worden in de database.";
    } catch (WachtwoordIncorrectException $e) {
        $error = "Het wachtwoord is niet correct.";
    }
}


include_once 'Presentation/login.php';


