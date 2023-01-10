<?php
    declare(strict_types=1);
    spl_autoload_register();
    
?>
<!DOCTYPE HTML>
<!-- presentation/bestellingoverzicht.php -->
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
<h1>Klantoverzicht</h1>
    <table>
			  <tbody>
             <?php
				use Entities\Klant;  
		
			
				$klant = unserialize($_SESSION["klantAccount"]);
				?>

               
    
				  <tr>
					  <td><?php echo $klant->getNaam(); ?></td>
					  <td><?php echo $klant->getVoornaam(); ?></td>
					  <td><?php echo $klant->getStraat(); ?></td>
                      <td><?php echo $klant->getNummer(); ?></td>
                      <td><?php echo $klant->getPostcode()->getPostcode(); ?></td>
                      <td><?php echo $klant->getPostcode()->getWoonplaats(); ?></td>
				  </tr>
                            <?php if ($klant->getPostcode()->getPostcode() < 9000 || $klant->getPostcode()->getPostcode() > 9100) { ?> 
                                <tr>
                                    <td>
                                            <p>Thuisbezorging niet mogelijk!</p>
                                    </td>
                               </tr>
                            <?php }?>
			
              </tbody>
		  </table> 

		  <h1>Verander Adres</h1>

		  <form method="post" action="toonbestelling.php?action=change">
                    <table>
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
                                    <td></td>
                                    <td>
                                            <input type="submit" value="Verander" />
                                    </td>
                            </tr>
                            <?php if (isset($_POST["Postcode"])) {
                            
                            if ((int)$_POST["Postcode"] < 9000 || (int)$_POST["Postcode"] > 9100) { ?> 
                                <tr>
                                    <td></td>
                                    <td>
                                            <p>Thuisbezorging niet mogelijk!</p>
                                    </td>
                            </tr>
                            <?php }
                            }?>
                    </table>
            </form>



    <h1>Besteloverzicht</h1>
    <table>
			  <tbody>
             <?php
				use Entities\Cart;  
		
				if (isset($_SESSION["cart"])) {
					$cartitems = unserialize($_SESSION["cart"]);
				}
				else $cartitems = array();

                foreach ($cartitems as $item) {	
			?>
    
				  <tr>
					  <td><?php echo $item->getNaam(); ?></td>
					  <td><?php echo $item->getPrijs(); ?>€</td>
					  <td>aantal <?php echo $item->getAantal(); ?></td>
                      <td><?php echo $item->getTotaalprijs(); ?>€</td>

				  </tr>
			<?php	  
				}
		    ?>
              </tbody>
		  </table>

                  <h1><a href="toonpizzas.php">Verander Bestelling</a></h1>

                  <form method="post" action="besteld.php?action=bestel">
                    
                               <input type="submit" value="Finaal bestellen" />
                 </form>
             
</body>
</html> 




