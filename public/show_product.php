<?php
// TODO: Archivo que muestra los productos por <id> ...

use App\Models\Product;
require_once __DIR__ . "/../config/bootstrap.php";
// *: Mostrar el nombre de un producto en función de su ID ...
$id = 1;
$product = $entityManager->find(Product::class, $id);

if ($product === null) {
    echo "No product found.\n";
    exit(1);
}

echo sprintf("-%s\n", $product->getName());