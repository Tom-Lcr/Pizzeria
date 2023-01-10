<?php
//toonpizzas.php
declare(strict_types = 1);

spl_autoload_register();

session_start();

//require_once("vendor/autoload.php");

use Business\ProductService;
use Entities\Product;
use Entities\Cart;

$productSvc = new ProductService();
$gevonden = false;
$pizzaLijst = $productSvc->getOverzicht();

//unset($_SESSION["klantAccount"]);

//unset($_SESSION["cart"]);

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "toevoegen":   
            if (isset($_GET["id"])) {  
				
				if (isset($_SESSION["cart"])) {   
					$cartitems = unserialize($_SESSION["cart"]);  
				}
				else $cartitems = array();   
				
                foreach ($cartitems as $item) {  
                    if ($item->getProdid() == $_GET["id"]) {
                        $item->setAantal($item->getAantal() +1);
                        $item->setTotaalprijs($item->getTotaalprijs()+$item->getPrijs());
                        $gevonden = true;
                    }
                }
				
                if ($gevonden === false) {  
					$product = $productSvc->haalProductOp((int)$_GET["id"]); 
					
                    $newitem = new Cart($product->getProductId(), $product->getNaam(), $product->getPrijs(), 1, $product->getPrijs());
                    array_push($cartitems, $newitem);
                }					
				$_SESSION["cart"] = serialize($cartitems); 
                	
		    }	
			break;
			
        case "verwijderen":    
            if (isset($_GET["id"])) { 
				
				if (isset($_SESSION["cart"])) {
					$cartitems = unserialize($_SESSION["cart"]);
				}
				else $cartitems = array();
				
				$i = 0;
                foreach ($cartitems as $item) {
                    if ($item->getProdId() == $_GET["id"]) {
						if ($item->getAantal() > 1) {  
                          $item->setAantal($item->getAantal() -1);
                          $item->setTotaalprijs($item->getTotaalprijs()-$item->getPrijs());
						}
						else {   
							
							unset($cartitems[$i]);
							sort($cartitems);  
						}
                    }
                    $i++;
                }
					
				$_SESSION["cart"] = serialize($cartitems);
                
		    }	
            	
            break;
         } 
          
}

include("presentation/pizzaOverzicht.php");	


