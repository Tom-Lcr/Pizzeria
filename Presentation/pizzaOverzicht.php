<?php
    declare(strict_types=1);
    spl_autoload_register();
    
?>
<!DOCTYPE HTML>
<!-- presentation/pizzaoverzicht.php -->      
<html>
<head>
    <meta charset=utf-8>
    <title>Pizzas</title>
    <style>
        table { border-collapse: collapse; }
	td, th { border: 1px solid black; padding: 3px; }
	th { background-color: #ddd; }
    </style>
    <link rel="stylesheet" href="./Presentation/css/main.css">
</head>
<body>
    <h1 class="bold">Klik op het plus 
    symbool om een pizza toe te voegen aan het winkelmandje.</h1>
        <table>
            <tr>
                <th>Naam</th>
		        <th>Info</th>
                <th>Prijs</th>
                <th>Promoprijs</th>
            </tr>
            <?php
            foreach ($pizzaLijst as $pizza) {
            ?>
                <tr>
                    <td >
                        <?php print($pizza->getNaam());?>
                        <a href="toonpizzas.php?action=toevoegen&id=<?php print($pizza->getProductId());?>">
                          <img class="h-6" src="img/plus-symbol.png" alt="toevoegen">
                        </a>
                        <a class="underline" href="toonpizzas.php?action=verwijderen&id=<?php print($pizza->getProductId());?>">
                          <img class="h-6" src="img/minus-symbol.png" alt="verwijderen">
                        </a>
                    </td>
                    <td>
                        <?php print($pizza->getProductInfo());?>
                    </td>
                    <td>
                        <?php print($pizza->getPrijs());?> €
                    </td>
                    <td>
                        <?php print($pizza->getPromotiePrijs());?> €
                    </td>
                </tr>
		<?php
		}
		?>
	</table>
    
    <h1 class="underline">Winkelmandje</h1>
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
          <form action="tussenpagina.php" method="post">
            <button class="text-blue-600 text-lg" type="submit" value="Afrekenen">Afrekenen</button>
         </form>
</body>
</html> 




