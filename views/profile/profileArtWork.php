<?php
require 'controllers/profileCtl/profileArtWorkCtl.php';
?>

<div class="container-fluid">

    <div class="container">
        <div class="row profilenav">
            <div class="col s12 m4">
                <a class="userchoicebutton" name="profileModif" href="./index.php?page=modifProfile&id=<?= $workById->idUser ?>">Modifier votre profil</a>
            </div>
            <div class="col s12 m4">
                <a class="btn connect waves-effect waves-light" name="addWork" href="./index.php?page=ajoutOeuvre&id=<?= $workById->idUser ?>">Ajouter une œuvre</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col s12 m8 offset-m2">
            <div class="card white darken-1 hoverable cardProfil">
                <div class="card-content black-text">
                    <div class="col s6 m4">
                        <img src="./img/artWorks/<?= $workById->picture ?>" width=65%/>                    
                    </div>
                    <div class="col s6 m8">
                        <div class="col s6 m4 offset-m1">
                            <span class="card-title left-align"><b><?= $workById->title ?></b></span>
                            <span class="card-title left-align">
                                <a href="index.php?page=myprofileArtist&id=<?= $workById->idUser; ?>"><?= $workById->nickName ?></a></span>
                            <span class="card-title left-align"><?= $workById->description ?></span>
                            <span class="card-title left-align"><i><?= $workById->date ?></i></span>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

