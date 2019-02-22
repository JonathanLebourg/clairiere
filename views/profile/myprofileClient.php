<?php
require 'controllers/profileCtl/myprofileClientCtl.php';
?>
<div class="container-fluid">
    <hr>
    <h1><b>Mon profil</b></h1>
    <hr>
</div>
<div class="container">
    <?php if (!isset($_SESSION['user']) || $_SESSION['user']->idUserType != 3) { ?>
        <div class="col s12 m8 offset-m2 center-align border">
            <p>Vous rencontrez une erreur de connexion ou n'êtes pas enregistré sur le site<p>
        </div>
    <?php } else { ?>
        <div class="row border">
            <div class="row">
                <div class="col s12 m3">
                    <p><b><?= $_SESSION['user']->nickName ?></b></p>
                </div>
                <div class="col s12 m3">
                    <p>
                        <a class="btn modal-trigger validateButton" href="#modalModifClient">Modifier mon profil</a>
                    </p>
                </div>
                <div class="col s12 m3">
                    <p>
                        <a class="btn modal-trigger validateButton" href="#modalModifPassword">Modifier mot de passe</a>
                    </p>
                </div>
                <div class="col s12 m3">
                    <p>
                        <a class="btn modal-trigger validateButton" href="#modalDeleteProfil">Supprimer mon profil</a>
                    </p>
                </div>
            </div>
            <div class="col s12 m6">
                <p>faudrait que je trouve un truc à mettre là</p>
            </div>
            <div class="col s12 m3">
                <p>$count le nombre d oeuvres qui m interessent</p>
                <p>$count messages</p>
                <p><a href="">mes messages</a></p>
            </div>
        </div>
        <div class="row">
            <hr>
            <h2><b>Les oeuvres qui m'intéressent</b></h2>
            <hr>
            <div class="row">
                <?php
                foreach ($listInterest as $interestWork) {
                    ?>
                    <div class="col s12 m6 border hoverable center-align">
                        <div class="col s12 m6">
                            <div class="imgProfileClientDiv">
                                <a href="index.php?page=artWork&id=<?= $interestWork->idArtWork; ?>">
                                    <img src="./img/artWorks/<?= $interestWork->picture ?>" class="imgProfileClient responsive-img" alt="artWork"/>                    
                                </a>
                            </div>
                        </div>
                        <div class="col s12 m6">
                            <h2><b><?= $interestWork->title ?></b></h2>
                            <p>Prix : <b><?= $interestWork->price ?> €</b></p>
                            <p>
                                <a class="btn modal-trigger validateButton" href="#modalDeleteInterest<?= $interestWork->idArtWorkInterest ?>">Supprimer</a>
                            </p>
                        </div>                        
                    </div>
                <?php } ?>
            </div>
        </div>

    </div>

    <!-- Modal MODIFICATION PROFIL-->
    <div id="modalModifClient" class="modal">
        <div class="modal-content">
            <h1>Modifier les informations de mon compte</h1>
            <hr>
            <div class="modal-content">
                <form method="POST" action="">
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
                        <button class="validateButton btn" type="submit" name="submitClientModif">
                            MODIFIER
                        </button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">ANNULER</a>
            </div>
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
                            <!--                        <label>
                                                        <input name="checkboxDelete" type="checkbox" />
                                                        <span>JE SUIS SUR</span>   
                                                    </label>-->
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

    <!-- Modal SUPPRIMER INTERET-->
    <?php
    foreach ($listInterest as $interestWork) {
        ?>
        <div id="modalDeleteInterest<?= $interestWork->idArtWorkInterest ?>" class="modal">
            <div class="modal-content">
                <h1>Supprimer mon intérêt pour cette oeuvre</h1>
                <hr>
                <p>Êtes-vous bien sûr de vouloir supprimer ?</p>
                <div class="modal-content">
                    <form method="POST" action="index.php?page=myprofileClient&id=<?php $_SESSION['user']->idUser ?>&delete=<?= $interestWork->idArtWorkInterest ?>" id="formInterestId<?= $interestWork->idArtWorkInterest ?>" >       
                        <div class="col s12 m12">
                            <button form="formInterestId<?= $interestWork->idArtWorkInterest ?>" class="validateButton btn" type="submit" name="submitDeleteInterest">
                                Supprimer
                            </button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">ANNULER</a>
                </div>
            </div>
        </div>
    <?php } ?>
<?php } ?>