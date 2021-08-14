<?php
// TODO: Archivo de creación de los amigos de usuarios ...

use App\Models\User;

require_once __DIR__ . "/../config/bootstrap.php";

$newUser = $argv[1];
$newFriend = $argv[2];

$user = $entityManager->getRepository(User::class)->findOneBy(['name' => $newUser]);
$friend = $entityManager->getRepository(User::class)->findOneBy(['name' => $newFriend]);
if (!$user) {
    $user = new User();
    $user->setName($newUser);
}
if (!$friend) {
    $friend = new User();
    $friend->setName($newFriend);
}
$user->addMyFriends($friend);
$entityManager->persist($user);
$entityManager->flush();

echo "Created User with ID " . $user->getId() . " con su amigo : " . $friend->getId() . "\n";
