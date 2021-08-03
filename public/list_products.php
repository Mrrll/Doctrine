<?php
// TODO: Archivo de listar los productos ...

use App\Models\Product;
require_once __DIR__ . "/../config/bootstrap.php";
// *: Buscaremos una lista de todos los Productos en la base de datos ...
$productRepository = $entityManager->getRepository(Product::class); // ?: Puede crear un objeto buscador (llamado repositorio) para cada tipo de entidad.
$products = $productRepository->findAll();

foreach ($products as $product) {
    echo ($product->Shipment() !== null) ? "Nombre : " . $product->getName() . " - Envio : " . $product->Shipment()->getDate()->format('Y-m-d H:i'). "\n" : "Nombre : " . $product->getName() . " - Envio : "."\n" ;
}