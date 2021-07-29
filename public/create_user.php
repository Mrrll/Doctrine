<?php
// TODO: Archivo de creación del usuario ...

use App\Models\User;
require_once __DIR__ . "/../config/bootstrap.php";
// *: Creamos la Entidad User ...
$newUsername = $argv[1];

$user = new User();
$user->setName($newUsername);

$entityManager->persist($user);
$entityManager->flush();

echo "Created User with ID " . $user->getId() . "\n";
