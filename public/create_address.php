<?php
// TODO: Archivo de creación del Direccion ...

use App\Models\Address;
use App\Models\User;
require_once __DIR__ . "/../config/bootstrap.php";

$newAddress = $argv[1];

$address = new Address();
$address->setAddress($newAddress);
// *: Buscamos un Usuario ...
$user = $entityManager->find(User::class, 1);
$user->setAddress($address);
$entityManager->persist($address);
$entityManager->persist($user);
$entityManager->flush();

echo "Created Address with ID " . $address->getId() . " en User " . $user->getId() . "\n";
