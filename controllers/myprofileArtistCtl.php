<?php

require 'models/users.php';

if (isset($_GET['id'])) {
    
    $artist = new user();
    $artist->idUser = $_GET['id'];
    $artistById = $artist->userById();
    
}

