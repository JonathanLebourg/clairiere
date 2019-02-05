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
    
    public function updateBio() {
        $query = 'UPDATE clair_biographies '
                . '      SET `present`= :present, '
                . '      `profilePicture`= :profilePicture,'
                . '      `idSpeciality`= :idSpeciality,'
                . '      WHERE `idUser`= :idUser ';

        $updateBio = $this->BDD->prepare($query);
        $updateBio->bindValue(':present', $this->present, PDO::PARAM_STR);
        $updateBio->bindValue(':profilePicture', $this->profilePicture, PDO::PARAM_STR);
        $updateBio->bindValue(':idSpeciality', $this->idSpeciality, PDO::PARAM_INT);
        $updateBio->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        return $updateBio->execute();
    }
    
    public function listBio() {
        $query = "SELECT * FROM clair_biographies";
        $result = $this->BDD->query($query);
        $data = $result->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }
    
    public function bioByIdUser() {
        $query = "SELECT * FROM clair_biographies WHERE idUser = :idUser";
        $bioByUser = $this->BDD->prepare($query);
        $bioByUser->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        $bioByUser->execute();
        return $bioByUser->fetch(PDO::FETCH_OBJ);
    }
    

}
