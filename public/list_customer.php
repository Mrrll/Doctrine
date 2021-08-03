<?php
// TODO: Archivo de listar los customer ...

use App\Models\Customer;
use App\Models\Cart;
require_once __DIR__ . "/../config/bootstrap.php";
// *: Buscaremos una lista de todos los clientes en la base de datos ...
$userRepository = $entityManager->getRepository(Customer::class); // ?: Puede crear un objeto buscador (llamado repositorio) para cada tipo de entidad.
$customers = $userRepository->findAll();
// *: Buscaremos una lista de todos los carritos en la base de datos ...
$userRepository = $entityManager->getRepository(Cart::class); // ?: Puede crear un objeto buscador (llamado repositorio) para cada tipo de entidad.
$carts = $userRepository->findAll();

foreach ($customers as $customer) {
       echo "Cliente : " . $customer->getName() . " - Carrito : " . $customer->Cart()->getName(). "\n";
}
foreach ($carts as $cart) {
       echo "Carrito : " . $cart->getName() . " - Cliente : " . $cart->Customer()->getName(). "\n";
}