<?php
// TODO: Archivo de Configuracion de los ejecutables de doctrine ...
require_once __DIR__ . "/../public/index.php";
return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);
