<?php

require 'models/users.php';
require 'models/biography.php';
require 'models/specialities.php';

$user = new user();
$bio = new biography();
$spec = new speciality();


$listUsers = $user->listUsers();
$listBio = $bio->listBio();
$listSpec = $spec->listSpec();

$countUsers = $user->usersCount();


if (isset($_POST['submit'])) {
    $user->id = htmlspecialchars($_GET['id']);
    $user->deleteUser();
}
?>

