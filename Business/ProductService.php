<?php
//Business/PostcodeService.php
declare(strict_types = 1);

namespace Business;

use Data\ProductDAO;
use Entities\Product;


class ProductService {
    

    public function getOverzicht(): array {
        $productDAO = new ProductDAO();
        $lijst = $productDAO->getAll();
        return $lijst;
    }
    
    public function haalProductOp(int $productId) :? Product {
    $productDAO = new ProductDAO();
    $product = $productDAO->getByProductId($productId);
    return $product;
    }

         
} 
