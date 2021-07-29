# Doctrine
 Comprensión Doctrine con php v7.3
## Instalación ...
>Abra la terminal y tipeé :
```console
composer up 
```
Una vez instalado ya está listo para su configuración...

## Configuración ...

>Creamos el archivo <code>.env</code> en la raíz del proyecto <code>./</code>

Una vez creado el archivo.
>Copiamos y pegamos el contenido del archivo <code>.env.example</code> 
>en el archivo <code>.env</code> que acabamos de crear. 

Rellenamos los datos de configuración.

### Database:
>Creamos la base de datos con el nombre que hemos proporcionado en la variable <code>DATABASE_NAME</code> en el <code>.env</code>

**`Nota:` 
La base de datos debe estar con el motor InnoDB y no debe contener ninguna tabla.**

# Uso
## Doctrine ORM:

### Entidad:
>Creamos el archivo <code>Product.php</code> en <code>./src/app/Models/</code> y añadimos el siguiente codigo.
```php
<?php
namespace App\Models;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="products")
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    // .. (other code)

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}
```
>Abra la terminal y tipeé :
```console
./bin/doctrine orm:schema-tool:update --force --dump-sql
```

**`Nota:` 
Especificar ambos indicadores --force y --dump-sql hará que las declaraciones DDL se ejecuten y luego se impriman en la pantalla..**

## Ejecución ...
>Abra la terminal y tipeé :
```console
php -S localhost:8080 -t public
```
**`Nota:` 
Ejecuta para almacenar el nuevo producto ...**

>Pues eso es todo para la v1.0 espero que sirva. 👍

## Cambios para siguiente versión v1.1 ...

**`Nota:` 
Se a modificado la configuración del `entityManager` que se declaraba en el `./public/index.php` y se a trasladado a un archivo de configuración en `./config/bootstrap.php`...**

>Acontinuación se a creado el archivo `create_product.php` en `./public` y hemos copiado la parte del codigo que habia en el `./public/index.php` antes de su eliminacion.
>Con el siguiente codigo:

```php
<?php
// TODO: Archivo de creación del producto ...

use App\Models\Product;
require_once __DIR__ . "/../config/bootstrap.php";
// *: Creamos la Entidad Productos ...
$newProductName = "Producto2";
$product = new Product();
$product->setName($newProductName);
// *: Almacenamos los datos ...
$entityManager->persist($product);
$entityManager->flush();

echo "Created Product with ID " . $product->getId() . "\n";

```

**`Nota:` 
Otro cambio a la hora de ejecutar los scripts con este cambio los resultado los mostraremos por la terminal ...**

## Ejecución ...
>Abra la terminal y tipeé :
```console
cd public
```
> Y despues:
```console
php create_product.php ORM
```
>Acontinuación se a creado el archivo `list_products.php` en `./public` y hemos añadido el siguiente codigo:

```php
<?php
// TODO: Archivo de listar los productos ...

use App\Models\Product;
require_once __DIR__ . "/../config/bootstrap.php";
// *: Buscaremos una lista de todos los Productos en la base de datos ...
$productRepository = $entityManager->getRepository(Product::class); // ?: Puede crear un objeto buscador (llamado repositorio) para cada tipo de entidad.
$products = $productRepository->findAll();

foreach ($products as $product) {
    echo sprintf("-%s\n", $product->getName());
}
```
## Ejecución ...
>Abra la terminal y tipeé :
```console
cd public
```
> Y despues:
```console
php list_products.php ORM
```
>Acontinuación se a creado el archivo `show_product.php` en `./public` y hemos añadido el siguiente codigo:

```php
<?php
// TODO: Archivo que muestra los productos por <id> ...

use App\Models\Product;
require_once __DIR__ . "/../config/bootstrap.php";
// *: Mostrar el nombre de un producto en función de su ID ...
$id = 1;
$product = $entityManager->find(Product::class, $id);

if ($product === null) {
    echo "No product found.\n";
    exit(1);
}

echo sprintf("-%s\n", $product->getName());
```
## Ejecución ...
>Abra la terminal y tipeé :
```console
cd public
```
> Y despues:
```console
php show_product.php ORM
```
>Pues eso es todo para la v1.1 espero que sirva. 👍
