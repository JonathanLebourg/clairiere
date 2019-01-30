<?php

require_once 'connectBDD.php';

class biography extends BDD {

    public $idBiography;
    public $present;
    public $profilePicture;
    public $idSpeciality;
    public $idUser;

//**-----------------
//*PARTIE GENERALE
//**-----------------

    public function addBio() {
        $query = 'INSERT INTO clair_biographies '
                . '      SET `present`= :present, '
                . '      `profilePicture`= :profilePicture,'
                . '      `idSpeciality`= :idSpeciality,'
                . '      `idUser`= :idUser ';

        $addBio = $this->BDD->prepare($query);
        $addBio->bindValue(':present', $this->present, PDO::PARAM_STR);
        $addBio->bindValue(':profilePicture', $this->profilePicture, PDO::PARAM_STR);
        $addBio->bindValue(':idSpeciality', $this->idSpeciality, PDO::PARAM_INT);
        $addBio->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        return $addBio->execute();
    }
    
    public function listBio() {
        $query = "SELECT * FROM clair_biographies";
        $result = $this->BDD->query($query);
        $data = $result->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

}
