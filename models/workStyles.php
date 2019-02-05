<?php

require_once 'connectBDD.php';

class workStyle extends BDD {

    public $idWorkStyle;
    public $workStyle;

    public function listStyles() {
        $query = "SELECT * FROM clair_workStyles";
        $result = $this->BDD->query($query);
        $data = $result->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

}

?>
