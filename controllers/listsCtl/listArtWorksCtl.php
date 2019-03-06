<?php
//on appelle le Modèle artWorks.php
require_once 'models/artWorks.php';
//on crée un nouvel objet $artWork qui hérite des attributs de la classe artWork 
$artWork1 = new artWork();
//On vérifie tout d'abord que le GET['style']existe 
if (isset($_GET['style'])) {
//    si il existe, et que le GET est "tout", on appelle la methode listArtWorks() du modèle artWorks qui liste toutes les oeuvres d'art 
    if ($_GET['style'] == 'tout') {
        $listArtWorks = $artWork1->listArtWorks();
    } else {
//      sinon, on effecture une boucle "foreach" pour récupérer la valeur à stocker dans la variable $searchorder
        foreach ($listStyles as $style) {
            if ($_GET['style'] == $style->workStyle) {
                $searchOrder = $style->idWorkStyle;
                $listArtWorks = $artWork1->listArtWorksByStyle($searchOrder);
            }
        }
    }
} else {
//  sinon, on appelle la méthode listArtWorks
    $listArtWorks = $artWork1->listArtWorks();
}