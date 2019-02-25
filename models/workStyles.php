<?php

require_once 'connectBDD.php';

class workStyle extends BDD {
//  Déclaration des attributs identiques à la table `workStyles`
    public $idWorkStyle;
    public $workStyle;
//  Fonction qui liste les styles pour les select des formulaires des oeuvres
    /**
     * 
     * @return type
     */
    public function listStyles() {
        $query = 'SELECT * FROM `clair_workStyles`';
        $list = $this->BDD->query($query);
        $listStyles = $list->fetchAll(PDO::FETCH_OBJ);
        return $listStyles;
    }
}
