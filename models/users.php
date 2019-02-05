<?php

require_once 'connectBDD.php';

class user extends BDD {

    public $idUser;
    public $nickName;
    public $lastName;
    public $firstName;
    public $password;
    public $mail;
    public $idUserType;

//**-----------------
//*PARTIE GENERALE
//**-----------------
    
//super requete à jointures avec tout de tout le monde
//-----------------------------------------------
//"SELECT * FROM clairiere.Users INNER JOIN userTypes ON userTypes.id = Users.id_userTypes LEFT JOIN biography ON biography.id_Users = Users.id LEFT JOIN specialities ON specialities.id = biography.id_specialities";

    public function listUsers() {
        $query = "SELECT * FROM clair_users "
                . "INNER JOIN clair_userTypes "
                . "ON clair_userTypes.idUserType = clair_users.idUserType "
                . "LEFT JOIN clair_biographies "
                . "ON clair_biographies.idUser = clair_users.idUser "
                . "LEFT JOIN clair_specialities "
                . "ON clair_specialities.idSpeciality = clair_biographies.idSpeciality";
        $result = $this->BDD->query($query);
        $data = $result->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

    public function listArtists() {
        $query = "SELECT * FROM clair_users "
                . "INNER JOIN clair_userTypes "
                . "ON clair_userTypes.idUserType = clair_users.idUserType "
                . "LEFT JOIN clair_biographies "
                . "ON clair_biographies.idUser = clair_users.idUser "
                . "LEFT JOIN clair_specialities "
                . "ON clair_specialities.idSpeciality = clair_biographies.idSpeciality "
                . "WHERE `clair_users`.`idUserType`=2";
        $result = $this->BDD->query($query);
        $data = $result->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }
    
    public function listArtistsBySpeciality($searchOrder) {
        $query = "SELECT * FROM clair_users "
                . "INNER JOIN clair_userTypes "
                . "ON clair_userTypes.idUserType = clair_users.idUserType "
                . "LEFT JOIN clair_biographies "
                . "ON clair_biographies.idUser = clair_users.idUser "
                . "LEFT JOIN clair_specialities "
                . "ON clair_specialities.idSpeciality = clair_biographies.idSpeciality "
                . "WHERE `clair_users`.`idUserType` = 2 "
                . "AND clair_biographies.idSpeciality LIKE $searchOrder";
        $result = $this->BDD->query($query);
        $data = $result->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

    public function lastUser() {
        $query = "SELECT MAX(`idUser`) as lastId FROM clair_users";
        $result = $this->BDD->query($query);
        $data = $result->fetch(PDO::FETCH_OBJ);
        return $data;
    }

    public function addUser() {
        $query = 'INSERT INTO clair_users '
                . '      SET `lastName`= :lastName, '
                . '      `firstName`= :firstName,'
                . '      `nickName`= :nickName,'
                . '      `password`= :password,'
                . '      `idUserType`= :idUserType,'
                . '      `mail`= :mail';

        $addUser = $this->BDD->prepare($query);
        $addUser->bindValue(':lastName', $this->lastName, PDO::PARAM_STR);
        $addUser->bindValue(':firstName', $this->firstName, PDO::PARAM_STR);
        $addUser->bindValue(':nickName', $this->nickName, PDO::PARAM_STR);
        $addUser->bindValue(':password', $this->password, PDO::PARAM_STR);
        $addUser->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $addUser->bindValue(':idUserType', $this->idUserType, PDO::PARAM_INT);
        return $addUser->execute();
    }

    public function updateUser() {
        $query = 'UPDATE clair_users '
                . 'SET `lastName`= :lastName, '
                . '`firstName`= :firstName, '
                . '`nickName`= :nickName, '
                . '`password`= :password, '
                . '`idUserType`= :idUserType, '
                . '`mail`= :mail '
                . 'WHERE `idUser` LIKE :idUser ';

        $updateUser = $this->BDD->prepare($query);
        $updateUser->bindValue(':lastName', $this->lastName, PDO::PARAM_STR);
        $updateUser->bindValue(':firstName', $this->firstName, PDO::PARAM_STR);
        $updateUser->bindValue(':nickName', $this->nickName, PDO::PARAM_STR);
        $updateUser->bindValue(':password', $this->password, PDO::PARAM_STR);
        $updateUser->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $updateUser->bindValue(':idUserType', $this->idUserType, PDO::PARAM_INT);
        $updateUser->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        return $updateUser->execute();
    }
    
    public function deleteUser() {

        $query = 'DELETE FROM `clair_users`
                WHERE `idUser` = :idUser';
        $deletePatient = $this->BDD->prepare($query);
        $deletePatient->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        return $deletePatient->execute();
    }

    public function alreadyExist() {
        $query = 'SELECT * FROM clair_users '
                . '      WHERE `nickName`= :nickName AND `mail`= :mail';
        $alreadyExist = $this->BDD->prepare($query);
        $alreadyExist->bindValue(':nickName', $this->nickName, PDO::PARAM_STR);
        $alreadyExist->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $alreadyExist->execute();
        if ($alreadyExist->rowCount() >= 1) {
            $count = TRUE;
        } else {
            $count = FALSE;
        }
        return $count;
    }
    public function userById() {
        $query = "SELECT * FROM clair_users "
                . "INNER JOIN clair_userTypes "
                . "ON clair_userTypes.idUserType = clair_users.idUserType "
                . "LEFT JOIN clair_biographies "
                . "ON clair_biographies.idUser = clair_users.idUser "
                . "LEFT JOIN clair_specialities "
                . "ON clair_specialities.idSpeciality = clair_biographies.idSpeciality "
                . "WHERE clair_users.idUser = :idUser";
             $result = $this->BDD->prepare($query);
             $result->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
             $result->execute();
        $data = $result->fetch(PDO::FETCH_OBJ);
        return $data;
    }

//**-----------------
//*PARTIE STATS
//**-----------------
    public function usersCount() {
        $query = "SELECT * FROM clair_users";
        $result = $this->BDD->query($query);
        $result->execute();
        $usersCount = $result->rowCount();
        return $usersCount;
    }

//**-----------------
//*PARTIE CLIENTS
//**-----------------
}
