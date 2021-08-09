<?php
// TODO: Archivo de listar los Características ...

use App\Models\Product;
require_once __DIR__ . "/../config/bootstrap.php";
// *: Buscaremos una lista de todas las características del Producto ...
$productId = $argv[1];
$product = $entityManager->find(Product::class, $productId);

echo "The product : ". $product->getName() . " It has these features : ". "\n";
foreach ($product->getFeatures() as $feature) {
    echo "This feature : " . $feature->getName();
    echo " It is associated with the Product : " . $feature->getProduct()->getName() ."\n";
}