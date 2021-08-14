<?php
// TODO: Archivo de listar las entidades ...
use App\Models\EntitySubClass;
require_once __DIR__ . "/../config/bootstrap.php";
$entityName = $argv[1];
// *: Listamos las entidades ...
$entity = $entityManager->getRepository(EntitySubClass::class)->findOneBy(['name' => $entityName]);

echo "Entity : ". $entity->getName() . " Mapped Int : " . $entity->getMapped1() . " Mapped Text : " .$entity->getMapped2() . "\n";
if (is_array($entity->getMappedRelated1())) {
    foreach ($entity->getMappedRelated1() as $related) {
        echo $related->getName();
    }
    die();
}
echo "Related to " . $entity->getMappedRelated1()->getName();