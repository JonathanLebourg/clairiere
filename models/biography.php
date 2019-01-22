<?php

require_once 'connectBDD.php';

class biography extends BDD {

    public $id;
    public $present;
    public $profilePicture;
    public $id_specialities;
    public $id_Users;

//**-----------------
//*PARTIE GENERALE
//**-----------------

    public function addBio() {
        $query = 'INSERT INTO biography '
                . '      SET `present`= :present, '
                . '      `profilePicture`= :profilePicture,'
                . '      `id_specialities`= :id_specialities,'
                . '      `id_Users`= :id_Users ';

        $addBio = $this->BDD->prepare($query);
        $addBio->bindValue(':present', $this->present, PDO::PARAM_STR);
        $addBio->bindValue(':profilePicture', $this->profilePicture, PDO::PARAM_STR);
        $addBio->bindValue(':id_specialities', $this->id_specialities, PDO::PARAM_INT);
        $addBio->bindValue(':id_Users', $this->id_Users, PDO::PARAM_INT);
        return $addBio->execute();
    }
    
    public function listBio() {
        $query = "SELECT * FROM biography";
        $result = $this->BDD->query($query);
        $data = $result->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

}
