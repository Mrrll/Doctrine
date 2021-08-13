<?php
// TODO: Archivo de listar las categorias ...

require_once __DIR__ . "/../config/bootstrap.php";

// *: Listamos la Entidad Category ...
$categories = $entityManager->getRepository('App\Models\Category')->getCategories(); // !: Si marca error es problema del plugin Intelephense ...

foreach ($categories as $category) {
    echo $category->getTitle() . " his father is : " . $category->getParent()->getTitle() . "\n";
}
