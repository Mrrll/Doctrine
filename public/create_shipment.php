<?php
// TODO: Archivo de creación del Envio ...

use App\Models\Shipment;
require_once __DIR__ . "/../config/bootstrap.php";

$newShipment = new DateTime("now");

$shipment = new Shipment();
$shipment->setDate($newShipment);
$entityManager->persist($shipment);
$entityManager->flush();

echo "Created Shipment with ID " . $shipment->getId() . "\n";
