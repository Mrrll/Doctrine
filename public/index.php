<?php
// TODO: Archivo unico de la app ...
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Dotenv\Dotenv;
use App\Models\Product;
require_once __DIR__ . '/../vendor/autoload.php';
Dotenv::createImmutable(__DIR__ . '/../')->load();

// *: Cree una configuración ORM de Doctrine "predeterminada" simple para las anotaciones ...
$paths = array(realpath(__DIR__ . '/../src/app/Models'));
$isDevMode = true;
$proxyDir = null;
$cache = null;
$useSimpleAnnotationReader = false;
$config = Setup::createAnnotationMetadataConfiguration(
    $paths,
    $isDevMode,
    $proxyDir,
    $cache,
    $useSimpleAnnotationReader
);

// ?: Parámetros de configuración de la base de datos ...
$conn = [
    'dbname' => $_ENV['DATABASE_NAME'], // ?: DataBase Name
    'user' => $_ENV['DATABASE_USER'], // ?: DataBase Username
    'password' => $_ENV['DATABASE_PASSWD'], // ?: DataBase Password
    'host' => $_ENV['DATABASE_HOST'], // ?: DataBase Host
    'driver' => $_ENV['DATABASE_DRIVER'], // ?: DataBase Driver
];

// ?: Obteniendo el administrador de la entidad ...
$entityManager = EntityManager::create($conn, $config);

// *: Creamos la Entidad Productos ...
$newProductName = "Producto1";
$product = new Product();
$product->setName($newProductName);
// *: Almacenamos los datos ...
$entityManager->persist($product);
$entityManager->flush();

echo "Created Product with ID " . $product->getId() . "\n";
