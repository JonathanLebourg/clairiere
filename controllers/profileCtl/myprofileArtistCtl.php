<?php

require 'models/users.php';
require 'models/artWorks.php';

if (isset($_GET['id'])) {
    
    $artist = new user();
    $artist->idUser = $_GET['id'];
    $artistById = $artist->userById();
    
    $artWork1 = new artWork();
    $artWork1->idUser = $_GET['id'];
    
    $ListArtWorkByArtist = $artWork1->artWorkByArtist();
   
}

