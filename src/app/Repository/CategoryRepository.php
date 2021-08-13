<?php
namespace App\Repository;
// TODO: Archivo Repositorio de la Entidad Category ...
use Doctrine\ORM\EntityRepository;
// *: Separar la lógica de consulta de Doctrine de su modelo ...
class CategoryRepository extends EntityRepository
{
    public function CompareRelationship(String $newCategoryParent, String $newCategoryChild)
    {
        $dql = "SELECT c, p FROM \App\Models\Category c JOIN c.parent p WHERE p.title = '$newCategoryParent' AND c.title = '$newCategoryChild'";

        $query = $this->getEntityManager()->createQuery($dql);
        return $query->getResult();
    }
    public function getCategories()
    {
        $dql = "SELECT c, p FROM \App\Models\Category c JOIN c.parent p";
        $query = $this->getEntityManager()->createQuery($dql);
        return $query->getResult();
    }
}