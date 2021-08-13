<?php
// TODO: Archivo de listar los grupos ...

require_once __DIR__ . "/../config/bootstrap.php";
$groupName = $argv[1];
// *: Listamos los usuarios por el grupo ...
$dql = "SELECT u, g FROM App\Models\User u JOIN u.groups g WHERE g.name = '$groupName'";

$query = $entityManager->createQuery($dql);
$users = $query->getResult();

echo "El Grupo : ". $groupName . " Tiene estos usuarios asociados " . "\n";
foreach ($users as $user) {
    echo "Usuario : " . $user->getName() . "\n";
}