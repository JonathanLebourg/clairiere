<?php
require 'controllers/navCtl.php';
?>
<!----------------------------
----------NAVBAR----------
---------------------------->
<div class="row">
    <!--navbar-->
    <div class="navbar-fixed">
        <nav>
            <!-- Dropdown Structure Artists-->
            <ul id="dropdownArtists" class="dropdown-content">
                <li><a href="index.php?page=listArtists&speciality=tout">Tout</a></li>
                <li class="divider"></li>
                <?php foreach ($listSpecialities as $speciality) { ?>
                    <li><a href="index.php?page=list&speciality=<?= $speciality->speciality ?>"><?= $speciality->speciality ?></a></li>
                <?php } ?>
            </ul>
            <!-- Dropdown Structure ArtWorks-->
            <ul id="dropdownArtWorks" class="dropdown-content">
                <li><a href="index.php?page=listArtWorks&style=tout">Tout</a></li>
                <li class="divider"></li>
                <?php foreach ($listStyles as $style) { ?>
                    <li><a href="index.php?page=listArtWorks&style=<?= $style->workStyle ?>"><?= $style->workStyle ?></a></li>
                <?php } ?>
            </ul>
            <div class="nav-wrapper">
                <ul id="nav-mobile" class="left hide-on-med-and-down">
                    <li id="navLogoLi">
                        <a href="index.php?page=accueil">
                            <img class="responsive-img navLogo" src="./img/clairiere_logoTEST1.png" alt="logo" />
                        </a>
                    </li>

                    <!-- Dropdown Trigger -->
                    <li><a class="dropdown-trigger" href="index.php?page=listArtists" data-target="dropdownArtists">Artistes<i class="material-icons right">arrow_drop_down</i></a></li>
                    <li><a class="dropdown-trigger" href="index.php?page=listArtWorks" data-target="dropdownArtWorks">Oeuvres<i class="material-icons right">arrow_drop_down</i></a></li>

                    <li><a href="index.php?page=whoIam">Qui sommes-nous ?</a></li>
                    <li><a href="index.php?page=contact">Nous contacter</a></li>

                    <!---------------------TEMPORAIRE--------------------->
                    <li><a href="index.php?page=admin"><b>Admin</b></a></li>
                </ul>
            </div>
            <div class="connectButtons row">                
                <a  class="inscription" href="index.php?page=inscription">S'inscrire</a>
                <button data-target="modal1" class="btn modal-trigger connect waves-effect waves-light" type="button" name="button">Se connecter</button>
            </div>
        </nav>
    </div>
</div>

<!-- Modal Structure -->
<div id="modal1" class="modal">
    <div class="modal-content">
        <div class="container">
            <h1><b>Connexion</b></h1>
            <hr>
        </div>
        <div class="container">
            <form method="POST" action="">
                <div class="row">  
                    <div class="input-field col s12 m12">  
                        <i class="material-icons prefix">account_circle</i>  
                        <input id="pseudo" name="pseudo" type="text" required value="<?= isset($pseudo) ? $pseudo : '' ?>" />  
                        <label class="label" for="pseudo">Pseudo de connexion</label> 
                        <p class="text-danger"><?= isset($formError['pseudo']) ? $formError['pseudo'] : ''; ?></p>
                    </div>
                    <div class="input-field col s12 m12">  
                        <i class="material-icons prefix">https</i>  
                        <input id="password" name="password" type="text" required value="<?= isset($password) ? $password : '' ?>"/>  
                        <label class="label" for="password">Mot de passe</label>  
                        <p class="text-danger"><?= isset($formError['password']) ? $formError['password'] : ''; ?></p>
                    </div>
                </div>
                <div class="row">
                    <button class="validateButton waves-effect waves-light btn-large" type="submit" >Se connecter</button>
                </div>
                <div class="row">
                    <button class="validateButton modal-close waves-effect waves-light btn-small" onclick="window.location.href = 'index.php?page=inscription'">S'inscrire pour la première fois</button>
                </div>
            </form>

        </div>
    </div>
</div>

