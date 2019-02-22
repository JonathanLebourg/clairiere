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


    if (isset($_POST['submitArtWorkInterest']) && isset($_SESSION['user'])) {
        $interest = new artWorkInterest();
        $interest->idArtWork = $_SESSION['interest']->idArtWork;
        $interest->idUser = $_SESSION['user']->idUser;
        $exist = $interest->alreadyExistArtWorkInterest();
        if ($exist == FALSE) {
            $interest->newArtWorkInterest();
            $_SESSION['toast'] = 'intérêt enregistré';
        } else {
            $_SESSION['toast'] = 'vous avez déjà cette oeuvre dans votre liste';
        }
    }
}