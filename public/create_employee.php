<?php
// TODO: Archivo de creación del Empleado o de la Persona ...

use App\Models\Employee;
use App\Models\Person;

require_once __DIR__ . "/../config/bootstrap.php";

if (isset($argv[2])) {
    $newEmployee = $argv[1];
    $newJob = $argv[2];
    $employee = new Employee();
    $employee->setName($newEmployee);
    $employee->setJob($newJob);
    $entityManager->persist($employee);
    $entityManager->flush();
    echo "Created Employee with ID " . $employee->getId() ."\n";
    die();
}
$newPerson = $argv[1];
$person = new Person();
$person->setName($newPerson);
$entityManager->persist($person);
$entityManager->flush();

echo "Created Person with ID " . $person->getId() ."\n";
