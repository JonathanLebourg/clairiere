<?php

require_once 'models/artWorks.php';
require_once 'models/artWorkInterest.php';

if (isset($_GET['id'])) {

    $work = new artWork();
    $work->idArtWork = $_GET['id'];
    $workById = $work->SeeArtWork();
    $_SESSION['interest'] = $workById;

//    if (isset($_SESSION['user']) && $_SESSION['user']->idUserType == 3 ) {
//        
//    }

    if (isset($_POST['submitArtWorkInterest']) && isset($_SESSION['user'])) {
        $interest = new artWorkInterest();
        $interest->idArtWork = $_SESSION['interest']->idArtWork;
        $interest->idUser = $_SESSION['user']->idUser;
        $exist = $interest->alreadyExistArtWorkInterest();
        if ($exist == FALSE) {
            $interest->newArtWorkInterest();
        } 
    }
}