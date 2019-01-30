<?php

require_once 'connectBDD.php';

class speciality extends BDD {

    public $idSpeciality;
    public $speciality;
    
//**-----------------
//*PARTIE GENERALE
//**-----------------
    
    public function listSpec() {
        $query = "SELECT * FROM clair_specialities";
        $result = $this->BDD->query($query);
        $data = $result->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

}
