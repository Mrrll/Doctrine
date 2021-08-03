<?php
// TODO: Archivo de listar los usuarios ...

use App\Models\User;
require_once __DIR__ . "/../config/bootstrap.php";
// *: Buscaremos una lista de todos los usuarios en la base de datos ...
$userRepository = $entityManager->getRepository(User::class); // ?: Puede crear un objeto buscador (llamado repositorio) para cada tipo de entidad.
$users = $userRepository->findAll();

foreach ($users as $user) {
       echo ($user->Address() !== null) ? "Nombre : " . $user->getName() . " - Dirección : " . $user->Address()->getAddress(). "\n" : "Nombre : " . $user->getName() . " - Dirección : "."\n" ;
}