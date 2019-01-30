<?php
require 'controllers/navCtl.php';
?>
<!--**----------NavBar----------**-->
<div class="row">
    <div>
        <!-- Dropdown Structure -->
        <ul id="dropdown1" class="dropdown-content">
            <li><a href="index.php?page=list&speciality=tout">Tout</a></li>
            <li class="divider"></li>
            <?php foreach ($listSpecialities as $speciality) {?>
            <li><a href="index.php?page=list&speciality=<?= $speciality->speciality?>"><?= $speciality->speciality?></a></li>
                <?php } ?>
        </ul>
        <!--navbar-->
        <div class="navbar-fixed">
            <nav>
                <div class="nav-wrapper">
                    <ul class="left hide-on-med-and-down">
                        <!---------------------TEMPORAIRE--------------------->
                        <li><a href="index.php?page=admin"><b>Admin</b></a></li>
                        <li><a href="index.php?page=myprofileArtist"><b>Artiste</b></a></li>
                        <li><a href="index.php?page=myprofileClient"><b>Client</b></a></li>


                        <li><a href="index.php?page=accueil">Accueil</a></li>
                        <li><a href="index.php?page=whoIam">Qui sommes-nous ?</a></li>
                        <!-- Dropdown Trigger -->
                        <li><a class="dropdown-trigger" href="index.php?page=list" data-target="dropdown1">Artistes<i class="material-icons right">arrow_drop_down</i></a></li>
                        <li><a href="index.php?page=contact">Nous contacter</a></li>
                    </ul>
                </div>
                <div class="connection">
                    <div class="buttons row">
                        <a  class="inscription" href="index.php?page=inscription">S'inscrire</a>
                        <button data-target="modal1" class="btn modal-trigger connect waves-effect waves-light" type="button" name="button">Se connecter</button>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>

<!-- Modal Structure -->
<div id="modal1" class="modal">
    <div class="modal-content">
        <div class="container">
            <h1>CONNEXION</h1>
            <hr>
        </div>
        <div class="container">
            <form method="POST" action="welcome.php">
                <div class="row">  
                    <div class="input-field col s12 m6">  
                        <i class="material-icons prefix">account_circle</i>  
                        <input id="pseudo" name="pseudo" type="text" required value="<?= isset($pseudo) ? $pseudo : '' ?>" />  
                        <label class="label" for="pseudo">Pseudo de connexion</label> 
                        <p class="text-danger"><?= isset($formError['pseudo']) ? $formError['pseudo'] : ''; ?></p>
                    </div>
                    <div class="input-field col s12 m6">  
                        <i class="material-icons prefix">https</i>  
                        <input id="password" name="password" type="text" required value="<?= isset($password) ? $password : '' ?>"/>  
                        <label class="label" for="password">Mot de passe</label>  
                        <p class="text-danger"><?= isset($formError['password']) ? $formError['password'] : ''; ?></p>
                    </div>
                </div>
                <div class="row">
                    <button class="choicebutton waves-effect waves-light btn" type="submit" >Se connecter</button>
                </div>
                <div class="row">
                    <button class="choicebutton modal-close waves-effect waves-light btn" onclick="window.location.href = 'index.php?page=inscription'">S'inscrire pour la première fois</button>
                </div>
            </form>

        </div>
    </div>
</div>

