<?php
// TODO: Archivo de creación del Articulo ...

use App\Models\Article;
use App\Models\Tag;
require_once __DIR__ . "/../config/bootstrap.php";

$newArticle = $argv[1];
$newTag = $argv[2];

$article = $entityManager->getRepository(Article::class)->findOneBy(['name' => $newArticle]);
if (!$article) {
    $article = new Article();
    $article->setName($newArticle);
}
$tag = new Tag();
$tag->setName($newTag);
$article->addTags($tag);
$entityManager->persist($tag);
$entityManager->persist($article);
$entityManager->flush();

echo "Created Article with ID " . $article->getId() . " and its tag : " . $tag->getId() . "\n";
