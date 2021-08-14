<?php
// TODO: Archivo de listar los Articulos y sus etiquetas ...
use App\Models\Article;
require_once __DIR__ . "/../config/bootstrap.php";
$articleName = $argv[1];
// *: Listamos las etiquetas por el Articulos ...

$article = $entityManager->getRepository(Article::class)->findOneBy(['name' => $articleName]);

echo "The Article : ". $articleName . " It has these tags : " . "\n";
foreach ($article->getTags() as $tag) {
    echo "Tag : " . $tag->getName() . "\n";
}