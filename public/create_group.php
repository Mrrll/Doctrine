<?php
// TODO: Archivo de creación del grupo de usuarios ...
use App\Models\User;
use App\Models\Group;
require_once __DIR__ . "/../config/bootstrap.php";

$newGroup = $argv[1];

$group = $entityManager->getRepository(Group::class)->findOneBy(['name' => $newGroup]);

if (!$group) {
   $group = new Group();
   $group->setName($newGroup);
}
$userId = $argv[2];
$user = $entityManager->find(User::class, $userId);
$user->addGroups($group);
$entityManager->persist($group);
$entityManager->persist($user);
$entityManager->flush();

echo "Created Group with ID : " . $group->getId() . " In user ID : " . $user->getId() . "\n";
