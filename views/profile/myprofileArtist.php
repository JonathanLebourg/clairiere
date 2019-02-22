<?php
require 'controllers/profileCtl/myprofileArtistCtl.php';
?>
<div class="container-fluid">
    <hr>
    <h1><b><?= $artistById->nickName ?></b></h1>
    <hr>
</div>
<div class="container">
    <?php if (isset($_SESSION['user']) && $_SESSION['user']->idUserType == 2 && $_SESSION['user']->idUser == $_GET['id']) { ?>
        <div class="row border">
            <div class="card white darken-1">  
                <div class="col s6 m3">
                    <a class="btn validateButton" name="profileModif" href="./index.php?page=modifProfile&id=<?= $artistById->idUser ?>">Modifier votre profil</a>
                </div>
                <div class="col s6 m3">
                    <a class="btn validateButton" name="addWork" href="./index.php?page=ajoutOeuvre&id=<?= $artistById->idUser ?>">Ajouter une œuvre</a>
                </div>
                <div class="col s6 m3">
                    <a class="btn modal-trigger validateButton" href="#modalModifPassword">Modifier mot de passe</a>
                </div>
                <div class="col s6 m3">
                    <a class="btn modal-trigger validateButton" href="#modalDeleteProfil">Supprimer mon profil</a>
                </div>
            </div>
        </div>
    <?php } ?> 
    <div class="row border">
        <div class="col s12 m4">
            <div class="card white darken-1 hoverable imgProfileDiv">
                <img src="./img/profilePicture/<?= $artistById->profilePicture ?>" class="responsive-img imgProfile" /> 
            </div>
        </div>
        <div class="col s12 m8 center-align">
            <div class="card white darken-1">
                <hr>
                <p class="justified"><b><?= $artistById->present ?></b></p> 
                <hr>    
            </div>
            <div class="card white darken-1">                    
                <p class="card-title"><i>Artiste <?= $artistById->speciality ?></i></p>  
            </div>

        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <?php foreach ($ListArtWorkByArtist as $work) { ?>
            <div class="col s12 m4 border hoverable">
                <div class="row center-align">
                    <h2><?= $work->title ?></h2>
                    <hr>
                </div>
                <div class="row imgArtWorkDiv">
                    <img src="img/artWorks/<?= $work->picture ?>" class="responsive-img imgArtWork"/>                 
                </div>
                <div class="row">
                    <div class="card-title centeralign"><p>Oeuvre datant de : <?= $work->date ?></p></div>
                    <div class="card-title centeralign"><p><i><?= $work->workStyle ?></i></p></div>
                    <div class="card-title centeralign">
                        <a href="index.php?page=artWork&id=<?= $work->idArtWork ?>" class="btn validateButton">+ de détails</a>
                    </div>
                    <hr>
                    <div class="card-title center-align">
                        <p class="justified">Prix : <b><?= $work->price ?> €</b></p>    
                    </div>
                    <hr>
                </div>
                <?php if (isset($_SESSION['user']) && $_SESSION['user']->idUserType == 2 && $_SESSION['user']->idUser == $_GET['id']) { ?>
                    <div class="row">
                        <div class="col s6 m6">
                            <a href="" data-target="modalModif<?= $work->idArtWork; ?>" class="modal-trigger btn validateButton">
                                <i class="tiny material-icons">mode_edit</i>MODIFIER</a>
                        </div>
                        <div class="col s6 m6">
                            <a href="" data-target="modalDelete<?= $work->idArtWork; ?>" class="modal-trigger btn validateButton">
                                <i class="tiny material-icons">delete</i>EFFACER</a>
                        </div>                        
                    </div>                
                <div class="row">
                    <p><b><?= $count; ?></b> personnes interessées</p>
                </div>                
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</div>
    <!-- Modal MODIFICATION PASSWORD-->
    <div id="modalModifPassword" class="modal">
        <div class="modal-content">
            <h1>Modifier mon mot de passe</h1>
            <hr>
            <div class="modal-content">
                <form method="POST" action="">
                    <div class="row">
                        <p><b>tapez votre mot de passe ACTUEL</b></p>
                        <input name="password" id="password" type="password" class="validate" value="" />
                        <label for="password"></label>
                        <p class="text-danger"><?= isset($formError['mail']) ? $formError['mail'] : ''; ?></p>
                    </div>

                    <div class="row">
                        <p><b>tapez votre NOUVEAU mot de passe</b></p>
                        <input name="passwordNew" id="passwordNew" type="password" class="validate" value="" />
                        <label for="passwordNew"></label>
                        <p class="text-danger"><?= isset($formError['mail']) ? $formError['mail'] : ''; ?></p>
                    </div>

                    <div class="row">
                        <p><b>retapez votre NOUVEAU mot de passe</b></p>
                        <input name="passwordCheck" id="passwordCheck" type="password" class="validate" value="" />
                        <label for="passwordCheck"></label>
                        <p class="text-danger"><?= isset($formError['mail']) ? $formError['mail'] : ''; ?></p>
                    </div>

                    <div class="col s12 m12">
                        <button class="validateButton btn" type="submit" name="submitClientPasswordModif">
                            MODIFIER
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">ANNULER</a>
        </div>
    </div>

    <!-- Modal SUPPRIMER PROFIL-->
    <div id="modalDeleteProfil" class="modal">
        <div class="modal-content">
            <h1>Supprimer mon profil</h1>
            <hr>
            <p>êtes-vous sur de vouloir supprimer définitivement votre profil ?<p>
            <div class="modal-content">
                <form method="POST" action="">
                    <div class="row">
                        <div class="col s12 m8 offset-m2 border">
                            <h2>ATTENTION</h2>
                            <p>cette action est irréversible</p>
                        </div>
                        <div class="col s12 m8 offset-m2">
                            <p>tapez votre mot de passe</p>
                            <input name="password" id="password" type="password" class="validate" value="" />
                            <label for="password"></label>
                            <p class="text-danger"><?= isset($formError['mail']) ? $formError['mail'] : ''; ?></p>
                        </div>
                        <div class="col s12 m12 card-action">
                            <button class="validateButton btn" type="submit" name="submitDeleteProfile">
                                SUPPRIMER
                            </button>
                        </div>
                    </div>
                </form>            
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">ANNULER</a>
            </div>
        </div>
    </div>


<!--BOUCLE POUR LES MODAL-->
<?php foreach ($ListArtWorkByArtist as $work) { ?>
    <!--MODAL pour supprimer une oeuvre-->
    <div id="modalDelete<?= $work->idArtWork; ?>" class="modal">
        <div class="modal-content">
            <div class="container">
                <h1>SUPPRIMER</h1>
                <div class="divider"></div>
            </div>
            <div class="container">
                <div class="row "> 
                    <p>ATTENTION, action irreversible !!!</p>
                    <form method="POST" action="index.php?page=myprofileArtist&id=<?= $work->idUser; ?>&delete=<?= $work->idArtWork; ?>" id="formId<?= $work->idArtWork; ?>">
                        <input  form="formId<?= $work->idArtWork; ?>" class="modal-action btn validateButton" type="submit" value="SUPPRIMER" name="deleteArtWork" />
                    </form>
                </div>
                <div class="row">
                    <a class="modal-close waves-effect waves-light btn more">ANNULER</a>
                </div>
            </div>
        </div>
    </div>
    <!--MODAL pour mofifeir son profil-->
    <div id="modalModif<?= $work->idArtWork; ?>" class="modal">
        <div class="modal-content">
            <div class="container">
                <div class="row">
                    <h1>Modification d'une oeuvre</h1>
                    <div class="divider"></div>
                </div>
            </div>     
            <div class="container">           
                <form class="col s12" method="POST" action="index.php?page=myprofileArtist&id=<?= $work->idUser; ?>&modif=<?= $work->idArtWork; ?>" id="formIdModif<?= $work->idArtWork; ?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="input-field col s12 m12">
                            <input name="title" id="title" type="text" class="validate" value="<?= isset($work->title) ? $work->title : '' ?>" />
                            <label for="title">Titre de l'oeuvre</label>
                            <p class="text-danger"><?= isset($formError['title']) ? $formError['title'] : ''; ?></p>
                        </div>
                        <div class="input-field col s12 m6">
                            <input name="date" id="date" type="text" class="validate" value="<?= isset($work->date) ? $work->date : '' ?>" />
                            <label for="date">Date</label>
                            <p class="text-danger"><?= isset($formError['date']) ? $formError['date'] : ''; ?></p>
                        </div>
                        <div class="input-field col s12 m6">
                            <select name="workStyle">
                                <option value="<?= isset($work->idWorkStyle) ? $work->idWorkStyle : '' ?>" selected><?= isset($work->workStyle) ? $work->workStyle : '' ?></option>
                                <?php foreach ($listWorkStyles as $style) { ?>
                                    <option value="<?= $style->idWorkStyle ?>"><?= $style->workStyle ?></option>
                                <?php } ?>
                            </select>
                            <label>Selectionnez le type d'oeuvre</label>
                            <p class="text-danger"><?= isset($formError['workstyle']) ? $formError['workstyle'] : ''; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12">
                            <input name="technic" id="technic" type="text" class="validate" value="<?= isset($work->technic) ? $work->technic : '' ?>" />
                            <label for="technic">Spécificités techniques (taille poids, etc)</label>
                            <p class="text-danger"><?= isset($formError['technic']) ? $formError['technic'] : ''; ?></p>
                        </div>

                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12">
                            <div class="file-field input-field">
                                <div class="userchoicebutton btn">
                                    <span>Photo</span>
                                    <input  type="file" name="fileToUpload" id="fileToUpload" />
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="jpg, jpeg ou png || 2Mo MAX" value="<?= isset($work->picture) ? $work->picture : '' ?>" />
                                </div>
                                <p class="text-danger"><?= isset($formError['fileToUpload']) ? $formError['fileToUpload'] : ''; ?></p>
                                <p class="text-danger"><?= isset($uploadError['NaImage']) ? $uploadError['NaImage'] : ''; ?></p>
                                <p class="text-danger"><?= isset($uploadError['exist']) ? $uploadError['exist'] : ''; ?></p>
                                <p class="text-danger"><?= isset($uploadError['size']) ? $uploadError['size'] : ''; ?></p>
                                <p class="text-danger"><?= isset($uploadError['type']) ? $uploadError['type'] : ''; ?></p>                    
                                <p class="text-danger"><?= isset($uploadError['uploadNotOK']) ? $uploadError['uploadNotOK'] : ''; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12">
                            <textarea id="description" class="materialize-textarea" name="description" maxlength="2000"></textarea>
                            <label for="description">Texte de présentation ||  <i>2000 caractères MAX.</i>  <span>  <i>* modifiable ultèrieurement</i></span></label>
                            <p class="text-danger"><?= isset($formError['description']) ? $formError['description'] : ''; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <button form="formIdModif<?= $work->idArtWork; ?>" class="btn validateButton" type="submit" name="submitModif">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>
