<?php
require 'controllers/formsCtl/modifArtistFormController.php';
?>
<div class="container-fluid">
    <div class="col s12 m8">
        <div class="col s12 m9">
            <hr>
            <h1><b>Modification de votre profil</b></h1>
            <hr>
        </div> 
        <?php if ($_SESSION['user']->idUser != $artistById->idUser) { ?>
            <div class="row border">
                <p>Vous n'avez pas les droits d'accès à cette page</p>
            </div>
        <?php } else { ?>
            <div class="container">
                <div class="row border">
                    <form method="POST" action="">
                        <div class="col s12 m4">
                            <div class="card white darken-1 hoverable imgProfileDiv">
                                <img src="./img/profilePicture/<?= $artistById->profilePicture ?>" class="responsive-img imgProfile" /> 
                            </div>
                            <div class="row">
                                <div class="col s12 m12">
                                    <a class="btn validateButton" name="submitProfileImg">
                                        <i class="tiny material-icons">mode_edit</i>
                                    </a>
                                </div>
                                <div class="row">
                                    <div class="modifDivProfileImg file-field input-field col s12 m12">
                                        <div class="validateButton btn">
                                            <span>Photo de profil</span>
                                            <input type="file" name="fileToUpload" id="fileToUpload">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text" placeholder="jpg, jpeg ou png || 2Mo MAX">
                                        </div>
                                        <div class="col s12 m12">
                                            <img src="" id="output" class="responsive-img" alt="aperçu de l'image" />
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
                        </div>
                        <div class="col s12 m8 center-align">
                            <div class="row">
                                <div class="card white darken-1">
                                    <div class="card-content">
                                        <hr>
                                        <div>
                                            <p><b><?= $artistById->present ?></b>

                                            <a class="btn validateButton" name="submitPresent">
                                                <i class="tiny material-icons">mode_edit</i>
                                            </a></p>
                                        </div>
                                        <div class="modifDivPresent input-field">
                                            <textarea id="present" class="materialize-textarea" name="present" maxlength="1000"><?= isset($artist->present) ? $artist->present : '' ?></textarea>
                                            <label for="present">Texte de présentation ||  <i>1000 caractères MAX.</i>  <span>  <i>* modifiable ultèrieurement</i></span></label>
                                            <p class="text-danger"><?= isset($formError['present']) ? $formError['present'] : ''; ?></p>
                                        </div>
                                        <hr>    
                                    </div>
                                </div>
                            </div>
                            <div class="row">                           
                                <div class="card white darken-1">
                                    <div class="card-content">
                                        <div>
                                            <p><i>Artiste <?= $artistById->speciality ?></i>  
                                             <a class="btn validateButton" name="submitSpeciality">
                                                <i class="tiny material-icons">mode_edit</i>
                                            </a></p>
                                        </div>    
                                        <div class="modifDivSpeciality input-field">
                                            <select name="speciality">
                                                <option value="<?= isset($artistById->idSpeciality) ? $artistById->idSpeciality : '' ?>" disabled selected>choisir une spécialité</option>
                                                <?php foreach ($listSpeciality as $spec) { ?>
                                                    <option value="<?= $spec->idSpeciality ?>"><?= $spec->speciality ?></option>
                                                <?php } ?>
                                            </select>
                                            <label for="speciality">Domaine artistique</label>
                                            <p class="text-danger"><?= isset($formError['specialities']) ? $formError['specialities'] : ''; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s6 m3"><b>Pseudo :</b></div>
                                <div class="col s6 m6"><?= $_SESSION['user']->nickName ?></div>
                                <div class="col s12 m3">
                                    <a class="btn validateButton" name="submitNickName">
                                        <i class="tiny material-icons">mode_edit</i>
                                    </a>
                                </div>
                                <div class="modifDivNickName input-field col s12 m8 offset-m2">
                                    <input name="nickName" id="nickName" type="text" class="validate" value="" />
                                    <label for="nickName">Pseudo</label>
                                    <p class="text-danger"><?= isset($formError['nickName']) ? $formError['nickName'] : ''; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s6 m3"><b>Nom :</b></div>
                                <div class="col s6 m6"><?= $_SESSION['user']->lastName ?></div>
                                <div class="col s12 m3">
                                    <a class="btn validateButton" name="submitLastName">
                                        <i class="tiny material-icons">mode_edit</i>
                                    </a>
                                </div>
                                <div class="modifDivLastName input-field col s12 m8 offset-m2">
                                    <input name="lastName" id="lastName" type="text" class="validate" value="" />
                                    <label for="lastName">Nom</label>
                                    <p class="text-danger"><?= isset($formError['lastName']) ? $formError['lastName'] : ''; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s6 m3"><b>Prénom :</b></div>
                                <div class="col s6 m6"><?= $_SESSION['user']->firstName ?></div>
                                <div class="col s12 m3">
                                    <a class="btn validateButton" name="submitFirstName">
                                        <i class="tiny material-icons">mode_edit</i>
                                    </a>
                                </div>
                                <div class="modifDivFirstName input-field col s12 m8 offset-m2">
                                    <input name="firstName" id="firstName" type="text" class="validate" value="" />
                                    <label for="firstName">Prénom</label>
                                    <p class="text-danger"><?= isset($formError['firstName']) ? $formError['firstName'] : ''; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s6 m3"><b>Mail :</b></div>
                                <div class="col s6 m6"><?= $_SESSION['user']->mail ?></div>
                                <div class="col s12 m3">
                                    <a class="btn validateButton" name="submitMail">
                                        <i class="tiny material-icons">mode_edit</i>
                                    </a>
                                </div>
                                <div class="modifDivMail input-field col s12 m8 offset-m2">
                                    <input name="mail" id="mail" type="text" class="validate" value="" />
                                    <label for="mail">Mail</label>
                                    <p class="text-danger"><?= isset($formError['mail']) ? $formError['mail'] : ''; ?></p>
                                </div>
                            </div>
                            <div class="col s12 m12">
                                <button class="validateButton btn" type="submit" name="submitArtistModif">
                                    MODIFIER
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

