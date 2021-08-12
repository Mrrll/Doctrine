<?php
// TODO: Archivo de listar los Estudiantes Autorreferencia ...

use App\Models\Student;
require_once __DIR__ . "/../config/bootstrap.php";
// *: Buscaremos un estudiante ...
$studentId = $argv[1];
$student = $entityManager->find(Student::class, $studentId);

echo $student->getName() . ' and his mentor is : ' . $student->getMentor()->getName() . "\n";
