<?php
// TODO: Archivo de creación del producto ...

use App\Models\Product;
use App\Models\Shipment;
require_once __DIR__ . "/../config/bootstrap.php";
// *: Creamos la Entidad Productos ...
// $newProductName = "Producto2";
$newProductName = $argv[1];
$shipment = $entityManager->find(Shipment::class, 1);
$product = new Product();
$product->setName($newProductName);
$product->setShipment($shipment);
// *: Almacenamos los datos ...
$entityManager->persist($product);
$entityManager->flush();

echo "Created Product with ID " . $product->getId() . "\n";
