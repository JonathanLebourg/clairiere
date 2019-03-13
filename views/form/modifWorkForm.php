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
    <?php
} else {
    if (!isset($_SESSION['user']) || ($_SESSION['user']->idUser != $workById->idUser)) {
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col s12 m8 offset-m2 center-align">
                    <hr>
                    <h1>Désolé</h1>
                    <p>Vous n'avez pas accès à cette page.</p>
                    <hr>
                </div>    
            </div>
        </div>
    <?php } else {
        ?>
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
                        <div class="row">
                            <div class="card-content">                                
                                <hr>
                                <div>
                                    <h1><b><?= $workById->title ?></b><a class="btn validateButton" name="submitTitle">
                                            <i class="tiny material-icons">mode_edit</i>
                                        </a></h1>
                                </div>
                                <div class="modifDivTitle input-field col s12 m8 offset-m1">
                                    <input name="title" id="title" type="text" />
                                    <label for="title">Titre de l'oeuvre</label>
                                    <p class="text-danger"><?= isset($formError['title']) ? $formError['title'] : ''; ?></p>
                                </div>
                                <hr>    
                            </div>
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
                                        <p><?= $workById->technicalDescription ?><a class="btn validateButton" name="submitTechnicalDescription">
                                                <i class="tiny material-icons">mode_edit</i>
                                            </a>
                                        </p> 
                                        <div class="modifDivTechnicalDescription input-field">
                                            <div class="input-field col s10 offset-s1 m10 offset-m1">
                                                <textarea name="technicalDescription" id="technicalDescription" class="materialize-textarea"  /></textarea>
                                                <label for="technicalDescription">Description technique (dimensions, matières, techniques, etc...)  ||  <i>2000 caractères MAX.</i></label>
                                                <p class="text-danger"><?= isset($formError['technicalDescription']) ? $formError['technicalDescription'] : ''; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="row">
                                        <div class="col s12 m12">
                                            <p><i><?= $workById->optionalDescription ?></i><a class="btn validateButton" name="submitOptionalDescription">
                                                    <i class="tiny material-icons">mode_edit</i>
                                                </a></p>
                                            <div class="modifDivOptionalDescription input-field">
                                                <div class="input-field col s10 offset-s1 m10 offset-m1">
                                                    <textarea id="optionalDescription" class="materialize-textarea" name="optionalDescription" maxlength="2000" /></textarea>
                                                    <label for="optionalDescription">Informations complémentaires de votre choix ||  <i>2000 caractères MAX.</i></label>
                                                    <p class="text-danger"><?= isset($formError['optionalDescription']) ? $formError['optionalDescription'] : ''; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <p>Date : <i><?= $workById->date ?></i></p>
                                </div>
                            </div>
                        </div>
                        <div class="card white darken-1">
                            <div class="card-content">
                                <div class="row">
                                    <div class="col s12 m12">
                                        <p> Prix : <b><?= $workById->price ?> €</b>
                                            <a class="btn validateButton" name="submitPrice">
                                                <i class="tiny material-icons">mode_edit</i>
                                            </a></p>
                                        <div class="modifDivPrice input-field">
                                            <input id="price" type="text" name="price" />
                                            <label for="price">Prix</label>
                                            <p class="text-danger"><?= isset($formError['price']) ? $formError['price'] : ''; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>