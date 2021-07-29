<?php
// TODO: Archivo de mostrar los bugs por <Id> ...

require_once __DIR__ . "/../config/bootstrap.php";

// *: Número de errores ...
$dql = "SELECT p.id, p.name, count(b.id) AS openBugs FROM App\Models\Bug b ".
       "JOIN b.products p WHERE b.status = 'OPEN' GROUP BY p.id";
$productBugs = $entityManager->createQuery($dql)->getScalarResult();

foreach ($productBugs as $productBug) {
    echo $productBug['name']." has " . $productBug['openBugs'] . " open bugs!\n";
}