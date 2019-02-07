<?php
require 'controllers/profileCtl/myprofileArtistCtl.php';
?>




<div class="profileArtistBody">

    <div class="container-fluid">

        <div class="container">
            <div class="row profilenav">
                <div class="col s12 m4">
                    <a class="userchoicebutton" name="profileModif" href="./index.php?page=modifProfile&id=<?= $artistById->idUser ?>">Modifier votre profil</a>
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
                            <a href="index.php?page=artWork&id=<?= $work->idArtWork; ?>">
                                <img src="img/artWorks/<?= $work->picture ?>"  width="75%"/></a>                    
                        </div>
                        <div class="col s12 m12">
                            <div class="col s12 m6">
                                <div class="card-title left-align"><?= $work->technic ?></div>
                                <div class="card-title left-align"><?= $work->date ?></div>
                                <div class="card-title left-align"><i><?= $work->workStyle ?></i></div>
                                <div class="card-title left-align"><?= $work->description ?></div>

                            </div>
                            <div class="col s12 m6">
                                <h4><?= $work->title ?></h4>
                                <p class="justified"><?= $work->description ?></p>    
                            </div>
                            <div class="row">
                                <a href="" data-target="modalDelete<?= $work->idArtWork; ?>" class="modal-trigger btn connect waves-effect waves-light">
                                    <i class="tiny material-icons">delete</i>EFFACER</a>
                            </div>
                            <div class="row">
                                <a href="" data-target="modalModif<?= $work->idArtWork; ?>" class="modal-trigger btn connect waves-effect waves-light">
                                    <i class="tiny material-icons">mode_edit</i>MODIFIER</a>
                            </div>
                        </div>
                    </div>
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
                                        <input  form="formId<?= $work->idArtWork; ?>" class="modal-action btn waves-effect waves-light more" type="submit" value="SUPPRIMER" name="deleteArtWork" />
                                    </form>
                                </div>
                                <div class="row">
                                    <a class="modal-close waves-effect waves-light btn more">ANNULER</a>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                        <button form="formIdModif<?= $work->idArtWork; ?>" class="userchoicebutton btn waves-effect waves-light" type="submit" name="submitModif">Envoyer</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

    </div>
</div>
</div>


