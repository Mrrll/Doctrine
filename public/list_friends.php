<?php
// TODO: Archivo de listar los Amigos del Usuario ...
use App\Models\User;
require_once __DIR__ . "/../config/bootstrap.php";
$userName = $argv[1];
// *: Listamos las los Amigos del Usuario ...

$user = $entityManager->getRepository(User::class)->findOneBy(['name' => $userName]);

echo "The User : ". $userName . " It has these Friends : " . "\n";
foreach ($user->getMyFriends() as $friend) {
    echo "Friend : " . $friend->getName() . "\n";
}