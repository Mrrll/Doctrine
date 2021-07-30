<?php
// TODO: Archivo de listar los bugs desde el repositorio ...

require_once __DIR__ . "/../config/bootstrap.php";

// *: Matriz de hidratación de la lista de errores ...

$bugs = $entityManager->getRepository('App\Models\Bug')->getRecentBugs(); // !: Si marca error es problema del plugin Intelephense ...

foreach ($bugs as $bug) {
    echo $bug->getDescription()." - ".$bug->getCreated()->format('d.m.Y')."\n";
    echo "    Reported by: ".$bug->getReporter()->getName()."\n";
    echo "    Assigned to: ".$bug->getEngineer()->getName()."\n";
    foreach ($bug->getProducts() as $product) {
        echo "    Platform: ".$product->getName()."\n";
    }
    echo "\n";
}