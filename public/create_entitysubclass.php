<?php
// TODO: Archivo de creación de la entidad ...

use App\Models\EntitySubClass;
require_once __DIR__ . "/../config/bootstrap.php";

$newEntity = $argv[1];
$numberMapped1 = $argv[2];
$textMapped1 = $argv[3];
$entity = $entityManager->getRepository(EntitySubClass::class)->findOneBy(['name' => $newEntity]);
if (!$entity) {
    $entity = new EntitySubClass();
    $entity->setName($newEntity);
}
$entity->setMapped1($numberMapped1);
$entity->setMapped2($textMapped1);
$entity->addMappedRelated1($entity);

$entityManager->persist($entity);
$entityManager->flush();

echo "Created entity with ID " . $entity->getId() ."\n";
