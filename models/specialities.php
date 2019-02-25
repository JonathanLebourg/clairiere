<?php

require_once 'connectBDD.php';

class speciality extends BDD {
//  Déclaration des attributs identiques à la table `specialities`
    public $idSpeciality;
    public $speciality;
//  Fonction qui liste les specialités pour les select dnas les formulaires
    public function listSpec() {
        $query = 'SELECT * FROM `clair_specialities`';
        $list = $this->BDD->query($query);
        $listSpec = $list->fetchAll(PDO::FETCH_OBJ);
        return $listSpec;
    }
}
