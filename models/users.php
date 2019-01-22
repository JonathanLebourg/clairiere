<?php

require 'connectBDD.php';

class user extends BDD {

    public $id;
    public $nickName;
    public $lastName;
    public $firstName;
    public $password;
    public $mail;
    public $id_userTypes;

//**-----------------
//*PARTIE GENERALE
//**-----------------

    public function listUsers() {
        $query = "SELECT * FROM Users";
        $result = $this->BDD->query($query);
        $data = $result->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

    public function listUsersWithBio() {
        $query = "SELECT * FROM Users LEFT JOIN `biography` ON `Users`.`id` = `biography`.`id_Users` INNER JOIN `specialities` ON `biography`.`id_specialities` = `specialities`.`id` WHERE `id_userTypes`=2";
        $result = $this->BDD->query($query);
        $data = $result->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

    public function lastUser() {
        $query = "SELECT MAX(`id`) as lastId FROM Users";
        $result = $this->BDD->query($query);
        $data = $result->fetch(PDO::FETCH_OBJ);
        return $data;
    }

    public function addUser() {
        $query = 'INSERT INTO Users '
                . '      SET `lastName`= :lastName, '
                . '      `firstName`= :firstName,'
                . '      `nickName`= :nickName,'
                . '      `password`= :password,'
                . '      `id_userTypes`= :id_userTypes,'
                . '      `mail`= :mail';

        $addPatient = $this->BDD->prepare($query);
        $addPatient->bindValue(':lastName', $this->lastName, PDO::PARAM_STR);
        $addPatient->bindValue(':firstName', $this->firstName, PDO::PARAM_STR);
        $addPatient->bindValue(':nickName', $this->nickName, PDO::PARAM_STR);
        $addPatient->bindValue(':password', $this->password, PDO::PARAM_STR);
        $addPatient->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $addPatient->bindValue(':id_userTypes', $this->id_userTypes, PDO::PARAM_INT);
        return $addPatient->execute();
    }

    public function deleteUser() {

        $query = 'DELETE FROM `Users`
                WHERE `id` = :id';
        $deletePatient = $this->BDD->prepare($query);
        $deletePatient->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $deletePatient->execute();
    }

    public function alreadyExist() {
        $query = 'SELECT * FROM Users '
                . '      WHERE `nickName`= :nickName AND `mail`= :mail';
        $alreadyExist = $this->BDD->prepare($query);
        $alreadyExist->bindValue(':nickName', $this->nickName, PDO::PARAM_STR);
        $alreadyExist->bindValue(':mail', $this->mail, PDO::PARAM_STR);$alreadyExist->execute();
        if ($alreadyExist->rowCount() >= 1) {
            $count = TRUE;
        } else {
            $count = FALSE;
        }
        return $count;
    }

//**-----------------
//*PARTIE STATS
//**-----------------
    public function usersCount() {
        $query = "SELECT * FROM Users";
        $result = $this->BDD->query($query);
        $result->execute();
        $usersCount = $result->rowCount();
        return $usersCount;
    }

//**-----------------
//*PARTIE CLIENTS
//**-----------------
}
