<?php

require_once 'connectBDD.php';

class speciality extends BDD {

    public $id;
    public $speciality;
    
//**-----------------
//*PARTIE GENERALE
//**-----------------
    
    public function listSpec() {
        $query = "SELECT * FROM specialities";
        $result = $this->BDD->query($query);
        $data = $result->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

}
