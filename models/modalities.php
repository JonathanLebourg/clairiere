<?php

require_once 'connectBDD.php';

class modality extends BDD {
//  Déclaration des attributs identiques à la table `modalities`
    public $idModality;
    public $modalityType;
//  Fonction qui liste les specialités pour les select dans les formulaires
    public function listModalities() {
        $query = 'SELECT * FROM `clair_modalities`';
        $list = $this->BDD->query($query);
        $listModalities= $list->fetchAll(PDO::FETCH_OBJ);
        return $listModalities;
    }
}
