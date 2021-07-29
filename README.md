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
```shell
./bin/doctrine orm:schema-tool:update --force --dump-sql
```

**`Nota:` 
Especificar ambos indicadores --force y --dump-sql hará que las declaraciones DDL se ejecuten y luego se impriman en la pantalla..**

## Ejecución ...
>Abra la terminal y tipeé :
```code
php -S localhost:8080 -t public
```
**`Nota:` 
Ejecuta para almacenar el nuevo producto ...**

>Pues eso es todo para la v1.0 espero que sirva. 👍
