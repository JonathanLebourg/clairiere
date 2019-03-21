<?php
require 'controllers/navCtl.php';
require 'controllers/connectCtl.php';
?>
<!------------------------
----------NAVBAR----------
------------------------->
<!--navbar-->
<div class="navbar-fixed">
    <nav>
        <div class="white">
            <div class="nav-wrapper">
                <!-- Dropdown Structure Artists-->
                <ul id="dropdownArtists" class="dropdown-content">
                    <li><a href="index.php?page=listArtists&speciality=tout">Tout</a></li>
                    <li class="divider"></li>
                    <?php foreach ($listSpecialities as $speciality) { ?>
                        <li><a href="index.php?page=listArtists&speciality=<?= $speciality->speciality ?>"><?= $speciality->speciality ?></a></li>
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

                <a href="#" class="brand-logo center hide-on-med-and-up show-on-medium-and-down"><img class="responsive-img navLogo" src="./img/clairiere_logoTEST1.png" alt="logo" /></a>
                <ul id="left-nav" class="navstick left hide-on-med-and-down">
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
                </ul>
                <div id="right-nav" class="right hide-on-med-and-down">
                    <div class="connectButtons row"> 
                        <?php if (!isset($_SESSION['user'])) { ?>
                            <a  class="inscription" href="index.php?page=inscription">S'inscrire</a>
                            <button data-target="modalConnect" class="btn modal-trigger validateButton" type="button" name="button">Se connecter</button>
                        <?php } else { ?>             
                            <a  class="inscription modal-trigger" href="#modalDeconnect">Se déconnecter</a>
                            <?php if ($_SESSION['user']->idUserType == 2) { ?>
                                <a class="btn validateButton " href="index.php?page=myprofileArtist&id=<?= $_SESSION['user']->idUser ?>">Mon profil</a>
                            <?php } ?>  
                            <?php if ($_SESSION['user']->idUserType == 3) { ?>
                                <a class="btn validateButton " href="index.php?page=myprofileClient">Mon profil</a>
                            <?php } ?>   
                            <?php if ($_SESSION['user']->idUserType == 1) { ?>
                                <a class="btn validateButton " href="index.php?page=myprofileAdmin">Administrateur</a>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
                <ul class="right hide-on-med-and-up show-on-medium-and-down">
                    <li><a data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<!--NAVBAR RESPONSIVE-->
<!-- Dropdown Structure Artists-->
<ul id="dropdownArtistsResponsive" class="dropdown-content">
    <li><a href="index.php?page=listArtists&speciality=tout">Tout</a></li>
    <li class="divider"></li>
    <?php foreach ($listSpecialities as $speciality) { ?>
        <li><a href="index.php?page=listArtists&speciality=<?= $speciality->speciality ?>"><?= $speciality->speciality ?></a></li>
    <?php } ?>
</ul>
<!-- Dropdown Structure ArtWorks-->
<ul id="dropdownArtWorksResponsive" class="dropdown-content">
    <li><a href="index.php?page=listArtWorks&style=tout">Tout</a></li>
    <li class="divider"></li>
    <?php foreach ($listStyles as $style) { ?>
        <li><a href="index.php?page=listArtWorks&style=<?= $style->workStyle ?>"><?= $style->workStyle ?></a></li>
    <?php } ?>
</ul>

<ul id="slide-out" class="sidenav">
    <li id="navLogoLi">
        <a href="index.php?page=accueil">
            <img class="responsive-img navLogo" src="./img/clairiere_logoTEST1.png" alt="logo" />
        </a>
    </li>
    <li><a class="subheader">Menu</a></li>
    <li><div class="divider"></div></li>
    <li><a class="dropdown-trigger" href="index.php?page=listArtists" data-target="dropdownArtistsResponsive">Artistes<i class="material-icons right">arrow_drop_down</i></a></li>
    <li><a class="dropdown-trigger" href="index.php?page=listArtWorks" data-target="dropdownArtWorksResponsive">Oeuvres<i class="material-icons right">arrow_drop_down</i></a></li>

    <li><a href="index.php?page=whoIam">Qui sommes-nous ?</a></li>
    <li><a href="index.php?page=contact">Nous contacter</a></li>
    <!---------------------TEMPORAIRE--------------------->
    <li><a href="index.php?page=admin"><b>Admin</b></a></li>
    <li>
        <div class="connectButtons row center center-align"> 
            <?php if (!isset($_SESSION['user'])) { ?>
                <div><a  class="inscription" href="index.php?page=inscription">S'inscrire</a></div>
                <div><button data-target="modalConnect" class="btn modal-trigger validateButton" type="button" name="button">Se connecter</button>
                </div>
            <?php } else { ?>             
                <div><a  class="inscription modal-trigger" href="#modalDeconnect">Se déconnecter</a>
                </div>
                <?php if ($_SESSION['user']->idUserType == 2) { ?>
                    <div><a class="btn validateButton " href="index.php?page=myprofileArtist&id=<?= $_SESSION['user']->idUser ?>">Mon profil</a>
                    </div>
                <?php } ?>  
                <?php if ($_SESSION['user']->idUserType == 3) { ?>
                    <div><a class="btn validateButton " href="index.php?page=myprofileClient">Mon profil</a>
                    </div>
                <?php } ?>   
            <?php } ?>
        </div>
    </li>
</ul>

<ul id="slide-out2" class="sidenav">
    <li><a href="index.php?page=listArtWorks&style=tout">Tout</a></li>
    <li class="divider"></li>
    <?php foreach ($listStyles as $style) { ?>
        <li><a href="index.php?page=listArtWorks&style=<?= $style->workStyle ?>"><?= $style->workStyle ?></a></li>
    <?php } ?>  
    <li><a data-target="slide-out" class="sidenav-trigger">RETOUR</a></li>
</ul>

<!-- Modal Connexion -->
<div id="modalConnect" class="modal">
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
                        <input id="mail" name="mail" type="text" required value="" />  
                        <label class="label" for="mail">Mail</label> 
                        <p class="text-danger"><?= isset($formError['mail']) ? $formError['mail'] : ''; ?></p>
                    </div>
                    <div class="input-field col s12 m12">  
                        <i class="material-icons prefix">https</i>  
                        <input id="password" name="password" type="password" required />  
                        <!--<label class="label" for="password">Mot de passe</label>-->  
                        <p class="text-danger"><?= isset($formError['password']) ? $formError['password'] : ''; ?></p>
                    </div>
                </div>
                <div class="row">
                    <button class="btn validateButton" name="submitConnect" type="submit">Se connecter</button>
                </div>
                <div class="row">
                    <button class="btn validateButton modal-close" onclick="window.location.href = 'index.php?page=inscription'">S'inscrire pour la première fois</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- Modal Connexion -->
<div id="modalDeconnect" class="modal">
    <div class="modal-content">
        <div class="row">
            <h1><b>Connexion</b></h1>
            <hr>
            <p>êtes-vous bien sur de vouloir vous déconnecter ?</p>
        </div>
        <div class="row">  
            <form method="POST" action="">
                <button class="btn validateButton" name="submitDeconnect" type="submit">Se déconnecter</button>
            </form>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">ANNULER</a>
        </div>
    </div>
</div>