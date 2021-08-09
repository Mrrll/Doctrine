<?php
// TODO: Archivo de creación del número de teléfono ...

use App\Models\Phonenumber;
use App\Models\User;

require_once __DIR__ . "/../config/bootstrap.php";
$userId = $argv[1];
$phoneNumber = $argv[2];

$user = $entityManager->find(User::class,$userId);
$phone = new Phonenumber();
$phone->setPhone($phoneNumber);
$user->addPhonenumbers($phone);
$entityManager->persist($phone);

$entityManager->flush();

echo "The phone number was created for the user with : " . $user->getId();