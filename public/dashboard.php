<?php
// TODO: Archivo de mostrar los bugs por <Id> ...

require_once __DIR__ . "/../config/bootstrap.php";

// *: Buscar por clave principal ...

$theUserId = $argv[1];

$dql = "SELECT b, e, r FROM App\Models\Bug b JOIN b.engineer e JOIN b.reporter r ".
       "WHERE b.status = 'OPEN' AND (e.id = ?1 OR r.id = ?1) ORDER BY b.created DESC";

$myBugs = $entityManager->createQuery($dql)
                        ->setParameter(1, $theUserId)
                        ->setMaxResults(15)
                        ->getResult();

echo "You have created or assigned to " . count($myBugs) . " open bugs:\n\n";

foreach ($myBugs as $bug) {
    echo $bug->getId() . " - " . $bug->getDescription()."\n";
}