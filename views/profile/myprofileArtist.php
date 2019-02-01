<?php
require 'controllers/profileCtl/myprofileArtistCtl.php';
?>




<div class="profileArtistBody">

    <div class="container-fluid">

        <div class="container">
            <div class="row profilenav">
                <div class="col s12 m4">
                    <a class="userchoicebutton" name="profileModif" href="./index.php?page=modifProfile">Modifier votre profil</a>
                </div>
                <div class="col s12 m4">
                    <a class="btn connect waves-effect waves-light" name="addWork" href="./index.php?page=ajoutOeuvre&id=<?= $artistById->idUser ?>">Ajouter une œuvre</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col s12 m8 offset-m2">
                <div class="card white darken-1 hoverable cardProfil">
                    <div class="card-content black-text">
                        <div class="col s6 m4">
                            <img src="./img/profilePicture/<?= $artistById->profilePicture ?>" width=65%/>                    
                        </div>
                        <div class="col s6 m8">
                            <div class="col s6 m4 offset-m1">
                                <span class="card-title left-align"><b><?= $artistById->nickName ?></b></span>
                                <span class="card-title left-align"><?= $artistById->lastName ?></span>
                                <span class="card-title left-align"><?= $artistById->firstName ?></span>
                                <span class="card-title left-align"><i><?= $artistById->speciality ?></i></span>

                            </div>
                            <div class="col s6 m6 offset-m1">
                                <h4>Présentation</h4>
                                <p class="justified"><?= $artistById->present ?></p>    
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <?php foreach ($ListArtWorkByArtist as $work) { ?>
                    <div class="col s6 m3">
                        <div class="col s12 m12">
                            <img src="./img/artWorks/<?= $work->picture ?>" width=75%/>                    
                        </div>
                        <div class="col s6 m8">
                            <div class="col s6 m4 offset-m1">
                                <span class="card-title left-align"><b><?= $work->title ?></b></span>
                                <span class="card-title left-align"><?= $work->technic ?></span>
                                <span class="card-title left-align"><?= $work->date ?></span>
                                <span class="card-title left-align"><i><?= $work->workStyle ?></i></span>

                            </div>
                            <div class="col s6 m6 offset-m1">
                                <h4>Description</h4>
                                <p class="justified"><?= $work->description ?></p>    
                            </div>

                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

    </div>
</div>
</div>


