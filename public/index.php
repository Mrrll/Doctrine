<?php
// TODO: Archivo unico de la app ...
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Dotenv\Dotenv;
require_once __DIR__ . '/../vendor/autoload.php';
Dotenv::createImmutable(__DIR__ . '/../')->load();
// Create a simple "default" Doctrine ORM configuration for Annotations
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

// database configuration parameters
$conn = [
    'dbname' => $_ENV['DATABASE_NAME'], // ?: DataBase Name
    'user' => $_ENV['DATABASE_USER'], // ?: DataBase Username
    'password' => $_ENV['DATABASE_PASSWD'], // ?: DataBase Password
    'host' => $_ENV['DATABASE_HOST'], // ?: DataBase Host
    'driver' => $_ENV['DATABASE_DRIVER'], // ?: DataBase Driver
];

// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);
