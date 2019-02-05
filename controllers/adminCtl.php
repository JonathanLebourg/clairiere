<?php

require 'models/users.php';
require 'models/biography.php';
//require 'models/specialities.php';
require 'models/artWorks.php';

$user = new user();
$bio = new biography();
$spec = new speciality();
$artWork = new artWork();

$listUsers = $user->listUsers();
$listBio = $bio->listBio();
$listSpec = $spec->listSpec();
$listArtWorks = $artWork->listArtWorks();

$countUsers = $user->usersCount();


if (isset($_POST['deleteUser'])) {
    $user->idUser = htmlspecialchars($_GET['id']);
    $user->deleteUser();
}

if (isset($_POST['deleteWork'])) {
    $artWork->idUser = htmlspecialchars($_GET['id']);
    $artWork->deleteArtWork();
}
?>

