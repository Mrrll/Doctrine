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

**`Nota:`
Otro cambio a la hora de ejecutar los scripts con este cambio los resultado los mostraremos por la terminal ...**


# Ejemplo 1
## Características más básicas del lenguaje de definición de metadatos.
>El archivo `create_product.php` en `./public` Creamos la Entidad Productos:

>Abra la terminal acceda a la carpeta `cd public` y tipeé :
```console
php create_product.php ORM
```
>El archivo `list_products.php` en `./public`  Buscaremos una lista de todos los Productos en la base de datos:

```console
php list_products.php ORM
```
>El archivo `show_product.php` en `./public` Mostrar el nombre de un producto en función de su ID:

```console
php show_product.php ORM
```

>El archivo `update_product.php` en `./public` Actualizaremos el nombre de un producto, dado su <Id>:

```console
php update_product.php ORM
```
> Y para ver los cambios:
```console
php show_product.php ORM
```
>Pues eso es todo para la v1.1 espero que sirva. 👍
 
 
# Ejemplo 2
## Implementando más requisitos.

 **`Nota:`
Generamos las entidades para relacionar un error, un informador, un ingeniero y productos Doctrine detectará estas relaciones y actualizará todas las entidades modificadas en la base de datos ...**

>El archivo `create_user.php` en `./public` Creamos la Entidad User:

>Abra la terminal acceda a la carpeta `cd public` y tipeé :create_user
```console
php create_user.php Pedro
```
>El archivo `create_bug.php` en `./public` Creamos la Entidad Bug:
```console
php create_bug.php 1 1 1
```
>El archivo `list_bugs.php` en `./public` Lista de errores:
```console
php list_bugs.php
```
>El archivo `list_bugs_array.php` en `./public` Matriz de hidratación de la lista de errores:
```console
php list_bugs_array.php
```
>El archivo `show_bug.php` en `./public` Buscar por clave principal:
```console
php show_bug.php 1
```
>El archivo `dashboard.php` en `./public` Cuadro de mando del usuario:
```console
php dashboard.php 1
```
>El archivo `products.php` en `./public` Número de errores:
```console
php products.php
```
>El archivo `close_bug.php` en `./public` Cerrar un error:
```console
php close_bug.php 1
```

>Pues eso es todo para la v1.2 espero que sirva. 👍
