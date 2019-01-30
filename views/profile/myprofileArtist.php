<?php
require 'controllers/myprofileArtistCtl.php'
?>




<div class="profileArtistBody">

    <div class="container-fluid">

        <div class="container">
            <div class="row profilenav">
                <div class="col s12 m4">
                    <a class="userchoicebutton" name="profileModif" href="./index.php?page=modifProfile">Modifier votre profil</a>
                </div>
                <div class="col s12 m4">
                    <button data-target="modalAddWork" class="btn modal-trigger connect waves-effect waves-light" type="button" name="button">Ajouter une œuvre</button>
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
        <div class="row">
            <div class="col s12">


            </div>
        </div>
    </div>
</div>


<!-- Modal Structure -->
<div id="modalAddWork" class="modal">
    <div class="modal-content">
        <div class="container">
            <div class="row">
                <h1>Ajout d'une oeuvre</h1>
                <div class="divider"></div>
            </div>
        </div>     
        <div class="container">           
            <form class="col s12" method="POST" action="" enctype="multipart/form-data">
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input name="title" id="title" type="text" class="validate" value="<?= isset($title) ? $title : '' ?>" />
                        <label for="title">Titre de l'oeuvre</label>
                        <p class="text-danger"><?= isset($formError['title']) ? $formError['title'] : ''; ?></p>
                    </div>
                    <div class="input-field col s12 m6">
                        <select>
                            <option value="" disabled selected>Choisir</option>
                            <option value="Peinture">Peinture</option>
                            <option value="Sculpture">Sculpture</option>
                            <option value="Dessin">Dessin</option>
                            <option value="Photographie">Photographie</option>
                            <option value="Edition">Edition</option>
                            <option value="Vidéo">Vidéo</option>
                        </select>
                        <label>Selectionnez le type d'oeuvre</label>
                    </div>
                    <p class="text-danger"><?= isset($formError['workstyle']) ? $formError['workstyle'] : ''; ?></p>
                </div>
                <div class="row">
                    <div class="input-field col s12 m4">
                        <input name="size" id="size" type="text" class="validate" value="<?= isset($size) ? $size : '' ?>" />
                        <label for="size">Dimensions</label>
                        <p class="text-danger"><?= isset($formError['size']) ? $formError['size'] : ''; ?></p>
                    </div>

                    <div class="input-field col s12 m4">
                        <input name="weight" id="weight" type="text" class="validate" value="<?= isset($weight) ? $weight : '' ?>" />
                        <label for="weight">Poids</label>
                        <p class="text-danger"><?= isset($formError['weight']) ? $formError['weight'] : ''; ?></p>
                    </div>
                    <div class="input-field col s12 m4">
                        <input name="date" id="date" type="text" class="validate" value="<?= isset($date) ? $date : '' ?>" />
                        <label for="date">Date</label>
                        <p class="text-danger"><?= isset($formError['date']) ? $formError['date'] : ''; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <div class="file-field input-field">
                            <div class="userchoicebutton btn">
                                <span>Photo</span>
                                <input  type="file" name="file">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="jpg, jpeg ou png || 2Mo MAX">
                            </div>
                            <p class="text-danger"><?= isset($formError['file']) ? $formError['file'] : ''; ?></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="present" class="materialize-textarea" name="present" maxlength="2000"></textarea>
                        <label for="present">Texte de présentation ||  <i>2000 caractères MAX.</i>  <span>  <i>* modifiable ultèrieurement</i></span></label>
                        <p class="text-danger"><?= isset($formError['present']) ? $formError['present'] : ''; ?></p>
                    </div>
                </div>
                <div class="row">
                    <button class="userchoicebutton btn waves-effect waves-light" type="submit" name="submit">Envoyer</button>
                </div>
            </form>

        </div>
    </div>
</div>