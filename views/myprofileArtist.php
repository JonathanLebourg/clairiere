<?php
//$lastName = htmlspecialchars($_POST['lastName']);
//$firstName = htmlspecialchars($_POST['firstName']);
//$pseudo = htmlspecialchars($_POST['pseudo']);
//$mail = htmlspecialchars($_POST['mail']);
//$password = htmlspecialchars($_POST['password']);
//$passwordCheck = htmlspecialchars($_POST['passwordCheck']);
//$town = htmlspecialchars($_POST['town']);
//$present = htmlspecialchars($_POST['present']);
//$file = $_FILES['file'];
?>
<!--<div class="container-fluid">
    <div class="container">
        <h1 class="result">Bien le bonjour <?= $firstName . ' ' . $lastName; ?> aka <b><?= $pseudo; ?></b></h1>
        <hr>
        <p>Bon retour parmi nous et bonne visite !</p>
    </div>
    <div class="container">
        <h2>Récapitulatif de vos informations de connexion</h2>
        <hr>
        <p>
        <ul>
            <li>Nom : <?= $lastName ?></li>
            <li>Prénom : <?= $firstName ?></li>
            <li>Votre pseudo : <?= $pseudo ?></li>
            <li>Mail : <?= $mail ?></li>
            <li>Votre mot de passe : <?= $password ?></li>
        </ul>
        </p>
    </div>
</div>-->



<div class="profileArtistBody">
     <!--<div class="divider"></div>-->
     <div class="container-fluid">
        <!--    <div class="container">
                <h1>PAGE TYPE DE PROFIL</h1>
            </div>
            <div class="divider"></div>
            <div class="row"></div>-->

        <div class="container">
            <div class="row profilenav">
                <div class="col s12 m4"><a class="userchoicebutton" name="profileModif" href="./index.php?page=modifProfile">Modifier votre profil</a></div>
                <div class="col s12 m4"><a class="userchoicebutton" name="addWork" href="./index.php?page=worksForm">Ajouter une oeuvre</a></div>
                <div class="col s12 m4"><a class="userchoicebutton" name="estimateWork" href="./index.php?page=estimateForm">Faire estimer une oeuvre</a></div>



            </div>
        </div>

        <div class="row">
            <div class="col s12 m3">
                <div class="card white darken-1 hoverable">
                    <div class="content1 card-content black-text">
                        <img src="./img/ramettePortrait.jpg" width=65%/>                    
                    </div>

                </div>
            </div>
            <div class="col s12 m9">
                <div class="card white darken-1 hoverable">
                    <div class="content1 card-content black-text">
                        <span class="card-title left-align"><b>Philippe RAMETTE</b></span>
                        <span class="card-title left-align"><b>Paris</b></span>
                        <span class="card-title left-align"><i>Photographe</i></span>
                        <p>"Mon désir d’utiliser le miroir est ancien et né de l’idée de jouer avec le double sens dumot, 
                            entre la réflexion visuelle et le processus mental. 
                            Le langage est souvent pour moi le point de départ d’un travail, 
                            à travers un jeu de mots ou une expression, comme tirer sur la corde, le fil du rasoir..." </p>
                        <span class="card-title left-align"><a class=" black-text" href="http://www.paris-art.com/philippe-ramette-8/"><i>Site perso</i></a></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col s12">
                <div class="card white darken-1">
                    <div class="card-content black-text">
                        <span class="card-title"><h2>Mes oeuvres</h2></span>
                        <div class="divider"></div>
                        <div class="row">
                            <div class="col s12 m4">
                                <div class="card white darken-1 hoverable">
                                    <div class="card-content black-text">
                                        <img src="./img/rametteIMG1.jpg" width=250 />
                                    </div>
                                    <div class="card-action">
                                        <span class="card-title left-align"><b>Sans Titre 1</b></span>
                                        <span class="card-title left-align"><b>photographie argentique</b></span>
                                        <span class="card-title left-align"><i>70cm x 40cm <i>(tirage limité à 25 exemplaires)</i></span>
                                        <span class="card-title left-align"><b>2007</b></span>
                                        <p>travail réalisé bla bla </p>                
                                    </div>
                                    <div class="card-action">
                                        <button class="userchoicebutton btn waves-effect waves-light" type="submit">INTERESSE</button>
                                    </div>
                                    <div class="card-action">
                                        <a href="#">modifier</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m4">
                                <div class="card hoverable">
                                    <div class="card white darken-1 hoverable">
                                        <div class="card-content black-text">
                                            <img src="./img/rametteIMG3.jpg" width=250 />
                                        </div>
                                        <div class="card-action">
                                            <span class="card-title left-align"><b>Sans Titre 1</b></span>
                                            <span class="card-title left-align"><b>photographie argentique</b></span>
                                            <span class="card-title left-align"><i>70cm x 40cm <i>(tirage limité à 25 exemplaires)</i></span>
                                            <span class="card-title left-align"><b>2007</b></span>
                                            <p>travail réalisé bla bla </p>                
                                        </div>
                                        <div class="card-action">
                                            <button class="userchoicebutton btn waves-effect waves-light" type="submit">INTERESSE</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m4">
                                <div class="card hoverable">
                                    <div class="card white darken-1 hoverable">
                                        <div class="card-content black-text">
                                            <img src="./img/rametteIMG3.jpg" width=250 />
                                        </div>
                                        <div class="card-action">
                                            <span class="card-title left-align"><b>Sans Titre 1</b></span>
                                            <span class="card-title left-align"><b>photographie argentique</b></span>
                                            <span class="card-title left-align"><i>70cm x 40cm <i>(tirage limité à 25 exemplaires)</i></span>
                                            <span class="card-title left-align"><b>2007</b></span>
                                            <p>travail réalisé bla bla </p>                
                                        </div>
                                        <div class="card-action">
                                            <button class="userchoicebutton btn waves-effect waves-light" type="submit">INTERESSE</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m4">
                                <div class="card white darken-1 hoverable">
                                    <div class="card-content black-text">
                                        <img src="./img/rametteIMG3.jpg" width=250 />
                                    </div>
                                    <div class="card-action">
                                        <span class="card-title left-align"><b>Sans Titre 1</b></span>
                                        <span class="card-title left-align"><b>photographie argentique</b></span>
                                        <span class="card-title left-align"><i>70cm x 40cm <i>(tirage limité à 25 exemplaires)</i></span>
                                        <span class="card-title left-align"><b>2007</b></span>
                                        <p>travail réalisé bla bla </p>                
                                    </div>
                                    <div class="card-action">
                                        <button class="userchoicebutton btn waves-effect waves-light" type="submit">INTERESSE</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m4">
                                <div class="card hoverable">
                                    <div class="card white darken-1 hoverable">
                                        <div class="card-content black-text">
                                            <img src="./img/rametteIMG1.jpg" width=250 />
                                        </div>
                                        <div class="card-action">
                                            <span class="card-title left-align"><b>Sans Titre 1</b></span>
                                            <span class="card-title left-align"><b>photographie argentique</b></span>
                                            <span class="card-title left-align"><i>70cm x 40cm <i>(tirage limité à 25 exemplaires)</i></span>
                                            <span class="card-title left-align"><b>2007</b></span>
                                            <p>travail réalisé bla bla </p>                
                                        </div>
                                        <div class="card-action">
                                            <button class="userchoicebutton btn waves-effect waves-light" type="submit">INTERESSE</button>
                                        </div>
                                    </div>
                                </div>
                            </div>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>