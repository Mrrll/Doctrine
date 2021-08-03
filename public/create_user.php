<?php
// TODO: Archivo de creación del usuario ...

use App\Models\User;
use App\Models\Address;
require_once __DIR__ . "/../config/bootstrap.php";
// *: Creamos la Entidad Address ...
$newAddress = $argv[2];
$address = new Address();
$address->setAddress($newAddress);
// *: Creamos la Entidad User ...
$newUsername = $argv[1];
$user = new User();
$user->setName($newUsername);
$user->setAddress($address);
$entityManager->persist($address); // ?: Añadimos a la persistencia ...
$entityManager->persist($user);
$entityManager->flush();

echo "Created User with ID " . $user->getId() . "\n";
