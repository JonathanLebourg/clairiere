<?php
require 'models/users.php';
    $user = new user();
$listUsers = $user->listUsersWithBio();
?>
