<?php
require 'controllers/profileCtl/profileArtWorkCtl.php';

if (!isset($_GET['id'])) {
    ?> 
    <div class="container-fluid">
        <div class="row">
            <div class="col s12 m8 offset-m2 border center-align">
                <hr>
                <h1>Désolé</h1>
                <p>Aucune oeuvre ne correspond à cette page.</p>
                <hr>
            </div>    
        </div>
    </div>
<?php } else { ?>
    <div class="container-fluid">       
        <hr>
        <h1><b><?= $workById->title ?></b></h1>
        <hr>
    </div>
    <div class="container">
        <div class="row">
            <div class="col s12 m8">
                <div class="card white darken-1 hoverable">
                    <img src="./img/artWorks/<?= $workById->picture ?>" class="responsive-img" alt="artWork"/>                    
                </div>
            </div>
            <div class="col s12 m4">
                <div class="card white darken-1">
                    <div class="card white darken-1">
                        <hr>
                        <h1><b><?= $workById->title ?></b></h1>
                        <hr>
                    </div>
                    <div class="card white darken-1">
                        <p>Artiste : 
                            <a class="black-text" href="index.php?page=myprofileArtist&id=<?= $workById->idUser; ?>"><?= $workById->nickName ?>
                            </a>
                        </p>
                    </div>
                    <div class="card white darken-1 center-align">
                        <div class="card-content">
                            <div class="row">
                                <div class="col s12 m12">
                                    <p><?= $workById->technicalDescription ?></p> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m12">
                                    <p><i><?= $workById->optionalDescription ?></i></p>
                                </div>
                            </div>
                            <div class="row">
                                <p>Date : <i><?= $workById->date ?></i></p>
                            </div>
                        </div>
                    </div>
                    <div class="card white darken-1">                    
                        <p> Prix : <b><?= $workById->price ?> €</b></p>
                    </div>
                    <?php
                    if (!isset($_SESSION['user'])) {
                        ?>
                        <div class="card white darken-1">
                            <button data-target="modalConnectByInterest" class="btn modal-trigger validateButton" type="button" name="button">Je suis interessé</button>
                        </div>
                        <?php
                    }
                    if (isset($_SESSION['user']) && $_SESSION['user']->idUserType == 3) {
                        ?>
                        <div class="card white darken-1">                    
                            <form method="POST" action="">
                                <input class="btn validateButton" type="submit" name="submitArtWorkInterest" value="je suis interessé" />
                            </form>
                        </div>
                        <?php
                    }
//                    if (isset($_SESSION['user']) && $_SESSION['user']->idUserType == 3) {
                        ?>
                    <!--                        <div class="card white darken-1">
                                                    <p><b>J'aime déjà</b></p>                           
                                                </div>-->
                        <?php
//                    }
                    if (isset($_SESSION['user']) && $_SESSION['user']->idUserType == 2 && $workById->idUser == $_SESSION['user']->idUser) {
                        ?>
                        <div class="card white darken-1">                    
                            <a class="btn validateButton" href="http://clairiere/index.php?page=modifWork&id=<?= $workById->idArtWork ?>">Modifier</a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- Modal Connexion -->
<div id="modalConnectByInterest" class="modal">
    <div class="modal-content">
        <div class="container">
            <h1><b>VOUS DEVEZ ÊTRE INSCRIT</b></h1>
            <hr>
        </div>
        <div class="container">
            <div class="row">
                <a class="btn validateButton modal-close" href ="index.php?page=inscription"><b>S'inscrire pour la première fois</b></a>
            </div>         
            <div class="row">
                <p><b><i>Déjà inscrit ? :</i></b></p>
                <button data-target="modalConnect" class="btn validateButton modal-trigger modal-close">Se connecter</button>
            </div>
        </div>
    </div>
</div>