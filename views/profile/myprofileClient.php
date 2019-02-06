<?php
require 'controllers/profileCtl/myprofileClientCtl.php';
?>
<div class="container">
    <h1 class="result">Bien le bonjour <?= $clientById->lastName . ' ' . $clientById->firstName; ?> aka <b><?= $clientById->nickName; ?></b></h1>
    <hr>
    <p>Vous êtes bien inscrit.</p>
</div>
<div class="container">
    <h2>Récapitulatif de vos informations de connexion</h2>
    <hr>
    <p>
    <ul>
        <li>Nom : <?= $clientById->lastName ?></li>
        <li>Prénom : <?= $clientById->firstName ?></li>
        <li>Votre pseudo : <?= $clientById->nickName ?></li>
        <li>Mail : <?= $clientById->mail ?></li>
        <li>Votre mot de passe : <?= $clientById->password ?></li>
        <li><a class="waves-effect waves-light btn modal-trigger" href="#modalModifClient">Modifier</a></li>
    </ul>
</div>


<!-- Modal Structure -->
<div id="modalModifClient" class="modal">
    <div class="modal-content">
        <h4>Modifier les informations de mon comte</h4>
        <p>Vos infos :</p>
        <div class="modal-content">
            <div class="row">
                <div class="col s12 m6">Pseudo : <?= $clientById->nickName ?></div>
                <div class="col s12 m6">
                    <form method="POST" action="" >
                        <div class="input-field col s12 m6">
                            <input name="nickName" id="lastName" type="text" class="validate" value="" />
                            <label for="nickName">Nom</label>
                            <p class="text-danger"><?= isset($formError['nickName']) ? $formError['nickName'] : ''; ?></p>
                        </div>
                        <div class="col s12 m6">
                            <button class="btn" type="submit" name="submitnickName">
                                <i class="tiny material-icons">mode_edit</i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col s12 m6">Nom : <?= $clientById->lastName ?></div>
                <div class="col s12 m6">
                    <form method="POST" action="" >
                        <div class="input-field col s12 m6">
                            <input name="lastName" id="lastName" type="text" class="validate" value="<?= isset($lastName) ? $lastName : '' ?>" />
                            <label for="lastName">Nom</label>
                            <p class="text-danger"><?= isset($formError['lastName']) ? $formError['lastName'] : ''; ?></p>
                        </div>
                        <div class="col s12 m6">
                            <button class="btn" type="submit" name="submitlastName">
                                <i class="tiny material-icons">mode_edit</i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col s12 m6">Prénom : <?= $clientById->firstName ?></div>
                <div class="col s12 m6">
                    <form method="POST" action="" >
                        <div class="input-field col s12 m6">
                            <input name="firstName" id="firstName" type="text" class="validate" value="" />
                            <label for="firstName">Nom</label>
                            <p class="text-danger"><?= isset($formError['firstName']) ? $formError['firstName'] : ''; ?></p>
                        </div>
                        <div class="col s12 m6">
                            <button class="btn" type="submit" name="submitfirstName">
                                <i class="tiny material-icons">mode_edit</i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col s12 m6">Nom : <?= $clientById->mail ?></div>
                <div class="col s12 m6">
                    <form method="POST" action="" >
                        <div class="input-field col s12 m6">
                            <input name="mail" id="mail" type="text" class="validate" value="<?= isset($lastName) ? $lastName : '' ?>" />
                            <label for="mail">Nom</label>
                            <p class="text-danger"><?= isset($formError['mail']) ? $formError['mail'] : ''; ?></p>
                        </div>
                        <div class="col s12 m6">
                            <button class="btn" type="submit" name="submitmail">
                                <i class="tiny material-icons">mode_edit</i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col s12 m6">Nom : <?= $clientById->password ?></div>
                <div class="col s12 m6">
                    <form method="POST" action="" >
                        <div class="input-field col s12 m6">
                            <input name="password" id="lastName" type="text" class="validate" value="" />
                            <label for="password">Nom</label>
                            <p class="text-danger"><?= isset($formError['password']) ? $formError['password'] : ''; ?></p>
                        </div>
                        <div class="col s12 m6">
                            <button class="btn" type="submit" name="submitpassword">
                                <i class="tiny material-icons">mode_edit</i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
           
        </div>

    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
</div>