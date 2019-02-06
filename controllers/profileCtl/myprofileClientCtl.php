<?php

require 'models/users.php';

if (isset($_GET['id'])) {

    $client = new user();
    $client->idUser = $_GET['id'];
    $clientById = $client->userById();
    
}
