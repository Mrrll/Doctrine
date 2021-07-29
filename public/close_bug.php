<?php
// TODO: Archivo de mostrar los bugs por <Id> ...

require_once __DIR__ . "/../config/bootstrap.php";

// *: Cerrar un error ...
$theBugId = $argv[1];

$bug = $entityManager->find("App\Models\Bug", (int)$theBugId);
$bug->close();

$entityManager->flush();