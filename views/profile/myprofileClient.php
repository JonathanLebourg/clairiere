<?php
require 'controllers/profileCtl/myprofileClientCtl.php';
?>
<div class="container-fluid">
    <hr>
    <h1><b>Mon profil</b></h1>
    <hr>
</div>
<div class="container">
    <div class="row border">
        <div class="col s12 m3">
            <p><b><?= $clientById->nickName ?></b></p>
            <p>
                <a class="waves-effect waves-light btn modal-trigger validateButton" href="#modalModifClient">Modifier mon profil</a>
            </p>
        </div>
        <div class="col s12 m6">
            <p>faidrait que je trouve un truc a mettre là</p>
        </div>
        <div class="col s12 m3">
            <p>$count le nombre d oeuvres qui m interesse</p>
            <p>$count messages</p>
            <p><a href="">mes messages</a></p>
        </div>
    </div>
    <div class="row">
        <h2>les oeuvres qui m interesse</h2>
        <hr>
    </div>
</div>

<!-- Modal Structure -->
<div id="modalModifClient" class="modal">
    <div class="modal-content">
        <h1>Modifier les informations de mon compte</h1>
        <hr>
        <div class="modal-content">
            <form method="POST" action="">
                <div class="row">
                    <div class="col s6 m3"><b>Pseudo :</b></div>
                    <div class="col s6 m6"><?= $clientById->nickName ?></div>
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
                    <div class="col s6 m6"><?= $clientById->lastName ?></div>
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
                    <div class="col s6 m6"><?= $clientById->firstName ?></div>
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
                    <div class="col s6 m6"><?= $clientById->mail ?></div>
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

                <div class="row">
                    <div class="col s6 m3"><b>mot de passe :</b></div>
                    <div class="col s6 m6"><?= $clientById->password ?></div>
                    <div class="col s12 m3">
                        <a class="btn validateButton" name="submitPassword">
                            <i class="tiny material-icons">mode_edit</i>
                        </a>
                    </div>
                    <div class="modifDivPassword input-field col s12 m8 offset-m2">
                        <input name="password" id="password" type="text" class="validate" value="" />
                        <label for="password">Mot de passe</label>
                        <p class="text-danger"><?= isset($formError['password']) ? $formError['password'] : ''; ?></p>
                    </div>
                </div>
                <div class="col s12 m12">
                    <button class="validateButton btn" type="submit" name="submitClientModif">
                        MODIFIER
                    </button>
                </div>
            </form>
        </div>

    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Fermer</a>
    </div>
</div>