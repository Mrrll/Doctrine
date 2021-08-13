<?php
// TODO: Archivo de creación de la categoria ...

use App\Models\Category;
require_once __DIR__ . "/../config/bootstrap.php";

$newCategoryParent = $argv[1];
$newCategoryChild = $argv[2];

$categories = $entityManager->getRepository(Category::class)->CompareRelationship($newCategoryParent, $newCategoryChild); // !: Si marca error es problema del plugin Intelephense ...
if ($categories) {
    die("A relationship with the father has already been created : " . $newCategoryParent . " and with the son : ". $newCategoryChild);
}

$categoryParent = new Category();
$categoryParent->setTitle($newCategoryParent);
$categoryChild = new Category();
$categoryChild->setTitle($newCategoryChild);
$categoryParent->addChildren($categoryChild);
$categoryChild->setParent($categoryParent);
$entityManager->persist($categoryParent);
$entityManager->persist($categoryChild);
$entityManager->flush();

echo "Created Category with ID " . $categoryParent->getId() ."\n";
