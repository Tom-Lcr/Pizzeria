<?php
    declare(strict_types=1);
    spl_autoload_register();
    
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset=utf-8>
    <title>Bestelling</title>
    <style>
        table { border-collapse: collapse; }
	td, th { border: 1px solid black; padding: 3px; }
	th { background-color: #ddd; }
    </style>
</head>
<body>
    <h1>Klant Aanmaken</h1>

		  <form method="post" action="register.php?action=aanmaken">
                    <table>
                            <tr>
                                    <td>Naam:</td>
                                    <td>
                                            <input type="text" name="Naam" />
                                    </td>
                            </tr>
                            <tr>
                                    <td>Voornaam:</td>
                                    <td>
                                            <input type="text" name="Voornaam" />
                                    </td>
                            </tr>
                            <tr>
                                    <td>Straat:</td>
                                    <td>
                                            <input type="text" name="Straat" />
                                    </td>
                            </tr>
                            <tr>
                                    <td>Nummer:</td>
                                    <td>
                                            <input type="number" name="Nummer" />
                                    </td>
                            </tr>
							<tr>
                                    <td>Postcode:</td>
                                    <td>
                                            <input type="number" name="Postcode" />
                                    </td>
                            </tr>
							<tr>
                                    <td>Woonplaats:</td>
                                    <td>
                                            <input type="text" name="Woonplaats" />
                                    </td>
                            </tr>
                            <tr>
                                    <td>Telefoonnummer:</td>
                                    <td>
                                            <input type="text" name="Telefoonnummer" />
                                    </td>
                            </tr>
                            <tr>
                                    <td>E-mail:</td>
                                    <td>
                                            <input type="email" name="Email" />
                                    </td>
                            </tr>
                            <tr>
                                    <td>Wachtwoord:</td>
                                    <td>
                                            <input type="password" name="Wachtwoord" />
                                    </td>
                            </tr>
                            <tr>
                                    <td></td>
                                    <td>
                                            <input type="submit" value="Aanmaken" />
                                    </td>
                            </tr>
                    </table>
            </form>
     </body>
</html> 

