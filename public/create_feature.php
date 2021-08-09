<?php
// TODO: Archivo de creación de las Características ...
use App\Models\Feature;
use App\Models\Product;

require_once __DIR__ . "/../config/bootstrap.php";
$productId = $argv[1];
$featureName = $argv[2];

$product = $entityManager->find(Product::class,$productId);

$feature = new Feature();
$feature->setName($featureName);
$product->addFeatures($feature); // ?: Tambien funciona -> $feature->setProduct($product);

$entityManager->persist($feature);
$entityManager->flush();

echo "Your Created product Id : ". $product->getId() . "And created feature Id : ". $feature->getId();