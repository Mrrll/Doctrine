<?php
// TODO: Archivo de listar los Empleados ...

use App\Models\Person;

require_once __DIR__ . '/../config/bootstrap.php';

// ? : Seleccionamos segun la entidad ....
// $dql = "SELECT p FROM App\Models\Person p WHERE p NOT INSTANCE OF App\Models\Employee";
// $query = $entityManager->createQuery($dql);
// $persons = $query->getResult();
// ? : ..................................................
// *: Listamos los Empleados ...
$persons = $entityManager->getRepository(Person::class)->findAll();
foreach ($persons as $person) {
    $tipe = new \ReflectionClass($person);
    echo "Entidad -> " . $tipe->getShortName() . "\n";
    echo "Name : " .$person->getName() . "\n";
    if ($tipe->getShortName() === 'Employee') {
        echo "Job : " . $person->getJob() . "\n";
    }
}
