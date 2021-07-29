<?php
// TODO: Archivo de creación del producto ...

use App\Models\Product;
require_once __DIR__ . "/../config/bootstrap.php";
// *: Creamos la Entidad Productos ...
$newProductName = "Producto2";
$product = new Product();
$product->setName($newProductName);
// *: Almacenamos los datos ...
$entityManager->persist($product);
$entityManager->flush();

echo "Created Product with ID " . $product->getId() . "\n";
