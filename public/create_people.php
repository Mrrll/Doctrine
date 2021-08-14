<?php
// TODO: Archivo de creación del Empleado o de la Persona ...

use App\Models\Player;
use App\Models\People;

require_once __DIR__ . "/../config/bootstrap.php";

if (isset($argv[2])) {
    $newEmployee = $argv[1];
    $newJob = $argv[2];
    $employee = new Player();
    $employee->setName($newEmployee);
    $employee->setPlayer($newJob);
    $entityManager->persist($employee);
    $entityManager->flush();
    echo "Created Player with ID " . $employee->getId() ."\n";
    die();
}
$newPerson = $argv[1];
$person = new People();
$person->setName($newPerson);
$entityManager->persist($person);
$entityManager->flush();

echo "Created People with ID " . $person->getId() ."\n";
