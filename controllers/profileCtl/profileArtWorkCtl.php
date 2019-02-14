<?php

require_once 'models/artWorks.php';
require_once 'models/artWorkInterest.php';

if (isset($_GET['id'])) {

    $work = new artWork();
    $work->idArtWork = $_GET['id'];
    $workById = $work->SeeArtWork();
//    var_dump($workById->idArtWork);
    $_SESSION['interest'] = $workById;
//    var_dump($_SESSION);
    $interest = new artWorkInterest();
    $interest->idArtWork = $_SESSION['interest']->idArtWork;

    if (isset($_POST['submitArtWorkInterest']) && isset($_SESSION['user'])) {
        $interest->idUser = $_SESSION['user']->idUser;
        $exist = $interest->alreadyExistArtWorkInterest();
        if ($exist = TRUE) {
            $interest->newArtWorkInterest();
        } else {
            $_SESSION['interestError'] = 'vous avez déjà cette oeuvre dans votre liste';    
        }
    }
}