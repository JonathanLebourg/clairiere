<?php
include './controllers/accueilCtl.php';
?>
<div class="container presentation">
    <div class="row">
        <div class="presentation-text col s12">
            <h1>La clairière</h1>
            <div class="divider"></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col s12 m4">
        <div class="card white darken-1 hoverable picturecard2">
            <div class="card-content black-text">
                <div class="row"><a onclick="window.open(this.href, '_blank');return false;" href="<?= $chem_img; ?>/<?= $listef[$random_img]; ?>" onclick="window.open(this.href, '_blank');return false;"><img style="border:none; width: <?= $width; ?>px ; height: <?= $height; ?>px " src="<?= $chem_img; ?>/<?= $listef[$random_img]; ?>" alt="<?= $listef[$random_img]; ?>" /></a></div>                   


            </div>
        </div>
    </div>
    <div class="col s12 m8">
        <div class="card white darken-1 hoverable picturecard">
            <div class="card-content black-text">
                <span class="card-title"><b></b></span>
                <p>
                    "Penser, c'est chercher des clairières dans une forêt."
                    Jules Renard
                </p>
                <p>« Une clairière est un lieu ouvert dans une zone boisée où la lumière du soleil arrive jusqu'au sol. Elle est un élément de l'écosystème forestier et peut être une source de produits forestiers autres que le bois. »</p>
                <p>La clairière est un site gratuit qui souhaite donner de la visibilité à toute personne se sentant artiste et souhaitant partager et/ou vendre son travail à toute personne amatrice d’art en tout genre désirant éventuellement acquérir des œuvres.
                    Le site se veut comme un endroit où chaque forme de création peut trouver sa part de lumière.
                    La clairière n’autorise aucuneS transactionS monétaires mais fonctionne comme une plateforme de mise en relation entre artistes et éventuels clients par le biais d’une messagerie.

                    Les artistes pourront après avoir créer leur profil mettre en ligne leurs œuvres avec un visuel et un descriptif en précisant si c’est à vendre et combien. Et de l’autre côtés les visiteurs pourront parcourir les œuvres des artistes et ceux inscrits pourront montrer leur intérêt pour les artistes de leurs choix et entrer en contact avec eux afin d’éventuellement discuter des modalités d’une vente.
                </p>

<!--                <p class="left-align">Plateforme gratuite d’estimation et de vente d’œuvres d’art pour artistes amateurs et confirmés.
    (un bon coin pour artistes, d’abord à échelle locale)<br />
    Les buts de ce site sont multiples. Tout d’abord, il veut donner de la visibilité aux artistes de tous types d’un côté  et de permettre aux visiteurs intéressés de s’offrir des œuvres uniques. Ensuite, afin d’aider les artistes dans l’étape difficile d’évaluation du prix de vente de chaque pièce, le site propose un système d’estimation participatif. Pas de règlement en ligne, ce site ne permet que la mise en relation des artistes et potentiels clients qui se débrouilleront ensuite eux-même pour les modalités de payement et de livraison.<br />
    Chaque artiste pourra personnaliser son espace personnel qui présente son univers, son parcours ainsi que ses actualités (expos, salons, etc) et ajouter les visuels de ces œuvres ainsi qu’un descriptif (titre, technique, format, poids éventuellement). Il pourra ensuite fixer un prix fixe ou bien soumettre son œuvre aux estimation des utilisateurs.<br />
</p><p><b>Fondamentaux :</b> <br />- Artistes :</p>
<ul class="center-align">                              
    <li>+ faire découvrir son travail, sa démarche, ses œuvres sur une page de présentation dédiée.</li>
    <li>+ demander une estimation aux membres du site pour fixer le bon prix.</li>
    <li>+ mettre en vente ses œuvres.</li>
    <li>+ renseigner sur son actualité (expos, salons, ...)</li>
</ul>                
<p>- Membres :</p>      
<ul>
    <li>+ découvrir les artistes</li>
    <li>+ estimer les œuvres</li>
    <li>+ acheter</li>
</ul>-->
            </div>
        </div>
    </div>
</div>