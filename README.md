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

>Generar un esquema de base de datos :
```console
./bin/doctrine orm:schema-tool:create
```
>Eliminar un esquema de base de datos :
```console
./bin/doctrine orm:schema-tool:drop --force
```
>Actualizar un esquema de base de datos :
```console
./bin/doctrine orm:schema-tool:update --force
```

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

>Abra la terminal acceda a la carpeta `cd public` y tipeé :
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

# Ejemplo 3
## Repositorios de entidades.

**`Nota:`
Separar la lógica de consulta de Doctrine de su modelo ...**

>Se ha creado el archivo `BugRepository.php` en `./src/app/Repository` Para toda la lógica de consulta DQL especializada en él.:

> Para hacer referencia a el. En el archivo `Bug.php` en `./src/app/Models` se añadido en siguiente codigo:
 ```php
 use App\Repository\BugRepository;
/**
 * @ORM\Entity(repositoryClass=BugRepository::class)
 * @ORM\Table(name="bugs")
 */
 ```
 >El archivo `list_bugs_repository.php` en `./public` Lista de errores:

 >Abra la terminal acceda a la carpeta `cd public` y tipeé :
```console
php list_bugs_repository.php
```
>Pues eso es todo para la v1.3 espero que sirva. 👍

## Doctrine Migrations:
**`Nota:` Doctrine Migrations es para versionar el esquema de su base de datos.**
 ### Configuración de migraciones:
 >Se ha creado el archivo `migrations.json` en la raiz del proyecto `./` Modifique la ruta o el namespace de sus migraciones en siguiente bloque de codigo :
 ```json
  "migrations_paths": {
       "Database\\Migrations": "./src/app/database/migrations"
    },
 ```
 **`Nota:` La ruta indicada en `migrations.json` debe de existir.**

 ### Clases de migración:

>Abra la terminal y tipeé :
```console
./bin/doctrine-migrations generate
```
> Generar una migración en blanco, Ejemplo: `Version20210730213047.php`.

 ### Agreguemos código a la migración:

 **`Nota:` Podemos agregar `(2 maneras)` para crear el codigo en el archivo `Version20210730213047.php` en `src/app/database/migrations`.**

 > Podemos utilizar `Sql` inyectandolo con el metodo `addSql()` de esta manera:

 ```php
 $this->addSql('CREATE TABLE example_table (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
 ```

 > O podemos utilizar con la clase `Schema` de esta manera:

```php
$Table = $schema->createTable("example_table");
$Table->addColumn("id", "integer", array("unsigned" => true, "autoincrement" => true));
$Table->addColumn("title", "string", array("length" => 255, "notnull" => false));
$Table->setPrimaryKey(array("id"));
```

#### Ejecución de varias migraciones:

>Abra la terminal y tipeé :
```console
 ./bin/doctrine-migrations migrate
```

#### Ejecución de migraciones únicas:

> Ejecutar una única migración hacia arriba o hacia abajo.(--up o --down).

>Abra la terminal y tipeé :
```console
 ./bin/doctrine-migrations execute Database\Migrations\Version20210730213047 --down
```
**`Nota:` Si nos fijamos estamos proporcionando el Namespace `Database\Migrations` que hemos registrado en el archivo `migrations.json` mas el nombre del version `Version20210730213047`.**

#### Revertir migraciones:

> Para volver a la primera versión, puede usar el `first` alias de la versión:

>Abra la terminal y tipeé :
```console
 ./bin/doctrine-migrations migrate first
```

#### Alias de versión:
* `first` - Migre a antes de la primera versión.
* `prev` - Migrar a una versión anterior a la anterior.
* `next` - Migre a la siguiente versión.
* `latest` - Migre a la última versión.

### Administrar la tabla de versiones:

> Marcar manualmente una migración como migrada o no.

>Abra la terminal y tipeé para añadir:
```console
 ./bin/doctrine-migrations version Database\Migrations\Version20210730213047 --add
```
> O eliminar esa versión:
```console
 ./bin/doctrine-migrations version Database\Migrations\Version20210730213047 --delete
```
**`Nota:`
Tenga cuidado al utilizar el comando `versión`. Si elimina una versión de la tabla y luego ejecuta el comando `migrate`, esa versión de migración se ejecutará nuevamente.**

### Diferenciar usando el ORM:

>Si está utilizando el ORM, puede modificar su información de mapeo y hacer que Doctrine genere una migración para usted comparando el estado actual de su esquema de base de datos con la información de mapeo que se define mediante el uso del ORM.

>Abra la terminal y tipeé :
```console
 ./bin/doctrine-migrations diff
```
**`Nota:` Esta instrucción compara la base de datos con las Entidades y genera las tablas de cada Entidad `(Entidades o Modelos)` en la ruta que hemos registrado en el archivo `bootstrap.php` en `config/`**

>Pues eso es todo para la v1.4 espero que sirva. 👍

## Doctrine ORM
### Mapeo de asociaciones ...
#### Muchos a uno, unidireccional
**`Nota:` Una asociación de varios a uno es la asociación más común entre objetos. Ejemplo: muchos usuarios tienen una dirección:**

>Abrimos el archivo `User.php` en `src/app/Models` y añadimos el siguiente codigo:
```php
/**
* @ManyToOne(targetEntity="Address")
* @JoinColumn(name="address_id", referencedColumnName="id")
*/
private $address;
/**
* Get the value of address
*/
public function Address()
{
    return $this->address;
}

/**
 * Set the value of address
 *
 * @return  self
 */
public function setAddress(Address $address)
{
    $this->address = $address;
}
```
>Creamos el archivo `Address.php` en `src/app/Models` y añadimos el siguiente codigo:
```php
<?php
namespace App\Models;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="address")
 */
class Address
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @var int
     */
    protected $id;
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $address;

    /**
     * Get the value of id
     *
     * @return  int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of address
     *
     * @return  string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @param  string  $address
     *
     * @return  self
     */
    public function setAddress(string $address)
    {
        $this->address = $address;
    }
}
```
>Actualizar el esquema de base de datos, Abra la terminal y tipeé :
```console
./bin/doctrine orm:schema-tool:update --force
```
>El archivo `create_address.php` en `./public` Creamos la dirección :
>Abra la terminal acceda a la carpeta `cd public` y tipeé :
```console
php create_address.php NuevaCalle
```
**`Nota:` Se ha agregado la funcion de añadir dirección en `create_user.php`**
>Abra la terminal acceda a la carpeta `cd public` y tipeé :
```console
php create_user.php Andres NuevaCalle
```
>El archivo `list_user.php` en `./public` Lista los usuarios y las direcciónes:
```console
php list_user.php
```
#### Uno a uno, unidireccional
**`Nota:` Asociación uno a uno con una entidad `Product` que hace referencia a una entidad `Shipment`:**

>Abrimos el archivo `Product.php` en `src/app/Models` y añadimos el siguiente codigo:
```php
 /**
 * One Product has One Shipment.
 * @ORM\OneToOne(targetEntity="Shipment")
 * @ORM\JoinColumn(name="shipment_id", referencedColumnName="id")
 */
private $shipment;
public function getShipment()
{
    return $this->shipment;
}

/**
 * Set one Product has One Shipment.
 *
 * @return  self
 */
public function Shipment(Shipment $shipment)
{
    $this->shipment = $shipment;
}
```
>Creamos el archivo `Shipment.php` en `src/app/Models` y añadimos el siguiente codigo:
```php
<?php
namespace App\Models;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="shipments")
 */
class Shipment
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
    */
    protected $id;
    /**
     * @ORM\Column(type="datetime")
     * @var DateTime
     */
    protected $date;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of date
     *
     * @return  \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @param  \DateTime  $date
     *
     * @return  self
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;
    }
}
```
>Actualizar el esquema de base de datos, Abra la terminal y tipeé :
```console
./bin/doctrine orm:schema-tool:update --force
```
>El archivo `create_shipment.php` en `./public` Creamos la fecha del envio :
>Abra la terminal acceda a la carpeta `cd public` y tipeé :
```console
php create_shipment.php
```
**`Nota:` Se ha agregado la funcion de añadir envio en `create_product.php`**
>Abra la terminal acceda a la carpeta `cd public` y tipeé :
```console
php create_product.php Producto3
```
**`Nota:` Se ha agregado la lectura del envio en `list_product.php`**
>El archivo `list_product.php` en `./public` Lista los productos y los envios:
>Abra la terminal acceda a la carpeta `cd public` y tipeé :
```console
php list_product.php
```
#### Uno a uno, bidireccional
**`Nota:` Una relación uno a uno entre la Entidad `Customery` a Entidad `Cart`. Las anotaciones `mappedBy` y `inversedBy` Se utilizan para decirle a Doctrine qué propiedad del otro lado se refiere al objeto. `inversedBy` ese es el lado propietario de la relación y, por lo tanto, contiene la clave externa.**

>Creamos el archivo `Customer.php` en `src/app/Models` y añadimos el siguiente codigo:
```php
<?php
namespace App\Models;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="customers")
 */
class Customer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @var int
     */
    protected $id;
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $name;
    /**
     * One Customer has One Cart.
     * @ORM\OneToOne(targetEntity="Cart", mappedBy="customer")
     */
    private $cart;

    /**
     * Get the value of id
     *
     * @return  int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of address
     *
     * @return  string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param  string  $name
     *
     * @return  self
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * Get one Customer has One Cart.
     */
    public function Cart()
    {
        return $this->cart;
    }

    /**
     * Set one Customer has One Cart.
     *
     * @return  self
     */
    public function setCart($cart)
    {
        $this->cart = $cart;
    }
}
```
>Creamos el archivo `Cart.php` en `src/app/Models` y añadimos el siguiente codigo:
```php
<?php
namespace App\Models;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="carts")
 */
class Cart
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @var int
     */
    protected $id;
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $name;
    /**
     * One Cart has One Customer.
     * @ORM\OneToOne(targetEntity="Customer", inversedBy="cart")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     */
    private $customer;

    /**
     * Get the value of id
     *
     * @return  int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of address
     *
     * @return  string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param  string  $name
     *
     * @return  self
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }



    /**
     * Get one Cart has One Customer.
     */
    public function Customer()
    {
        return $this->customer;
    }

    /**
     * Set one Cart has One Customer.
     *
     * @return  self
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
    }
}
```
>Actualizar el esquema de base de datos, Abra la terminal y tipeé :
```console
./bin/doctrine orm:schema-tool:update --force
```
>El archivo `create_customer.php` en `./public` Creamos el cliente y el carrito :
>Abra la terminal acceda a la carpeta `cd public` y tipeé :
```console
php create_customer.php Paco Carrito2
```
>El archivo `list_customer.php` en `./public` Lista los clientes y los carritos en ambas direcciones:
>Abra la terminal acceda a la carpeta `cd public` y tipeé :
```console
php list_customer.php
```
