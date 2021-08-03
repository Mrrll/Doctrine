<?php
// TODO: Archivo de creación del Customer ...

use App\Models\Customer;
use App\Models\Cart;
require_once __DIR__ . "/../config/bootstrap.php";
// *: Creamos la Entidad Customer ...
$newCustomer = $argv[1];
$customer = new Customer();
$customer->setName($newCustomer);
$customer->setName($newCustomer);
$entityManager->persist($customer); // ?: Añadimos a la persistencia ...
// *: Creamos la Entidad Cart ...
$newCart = $argv[1];
$cart = new Cart();
$cart->setName($newCart);
$cart->setCustomer($customer);
$entityManager->persist($cart); // ?: Añadimos a la persistencia ...
$entityManager->flush();

echo "Created Customer with ID " . $customer->getId() . "\n";
