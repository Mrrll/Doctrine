<?php
// TODO: Archivo que actualiza los productos ...

use App\Models\Product;
require_once __DIR__ . "/../config/bootstrap.php";
// *: Actualizaremos el nombre de un producto, dado su <Id> ...
$id = 1;
$newName = 'ProductoA';

$product = $entityManager->find(Product::class, $id);

if ($product === null) {
    echo "Product $id does not exist.\n";
    exit(1);
}

$product->setName($newName);

$entityManager->flush();
// ?:La implementación de Doctrine del patrón UnitOfWork. Doctrine realiza un seguimiento de todas las entidades que se recuperaron del Entity Manager y puede detectar cuándo se ha modificado alguna de las propiedades de esas entidades. Como resultado, en lugar de tener que llamar persist($entity)a cada entidad individual cuyas propiedades se cambiaron, una sola llamada al flush()final de una solicitud es suficiente para actualizar la base de datos de todas las entidades modificadas.