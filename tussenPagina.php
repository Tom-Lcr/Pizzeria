<?php

declare(strict_types=1);

spl_autoload_register();



session_start();

//unset($_SESSION["klantAccount"]);

if (isset($_SESSION["klantAccount"])) {
    header("location: toonbestelling.php");
}

include_once 'Presentation/tussenpagina.php';





