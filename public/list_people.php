<?php
// TODO: Archivo de listar los Empleados ...

use App\Models\People;

require_once __DIR__ . '/../config/bootstrap.php';

// *: Listamos los Empleados ...
$peoples = $entityManager->getRepository(People::class)->findAll();

foreach ($peoples as $people) {
    $tipe = new \ReflectionClass($people);
    echo "Entidad -> " . $tipe->getShortName() . "\n";
    echo "Name : " .$people->getName() . "\n";
    if ($tipe->getShortName() === 'Player') {
        echo "Player : " . $people->getPlayer() . "\n";
    }
}
