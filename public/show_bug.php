<?php
// TODO: Archivo de mostrar los bugs por <Id> ...

require_once __DIR__ . "/../config/bootstrap.php";

// *: Buscar por clave principal ...
$theBugId = $argv[1];

$bug = $entityManager->find("App\Models\Bug", (int)$theBugId);

echo "Bug: ".$bug->getDescription()."\n";
echo "Engineer: ".$bug->getEngineer()->getName()."\n";
