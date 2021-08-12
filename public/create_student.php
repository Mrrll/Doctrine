<?php
// TODO: Archivo de creación del Estudiate y mentor ...

use App\Models\Student;
require_once __DIR__ . "/../config/bootstrap.php";

$newStudent = $argv[1];

$student = new Student();
$student->setName($newStudent);
$student->setMentor($student); // ? : Autorreferencia ...
$entityManager->persist($student);
$entityManager->flush();

echo "Created Stundent with ID " . $student->getId() ."\n";
