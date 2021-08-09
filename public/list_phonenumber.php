<?php
// TODO: Archivo de listar los números de teléfono ...

use App\Models\User;
require_once __DIR__ . "/../config/bootstrap.php";
// *: Buscaremos una lista de todos los números de teléfono del Usuario ...
$userId = $argv[1];
$user = $entityManager->find(User::class, $userId);

echo "The user : ". $user->getName() . " It has these Phone numbers : ". "\n";
foreach ($user->getPhonenumbers() as $phone) {
    echo "This phone : " . $phone->getPhone() ."\n";
}