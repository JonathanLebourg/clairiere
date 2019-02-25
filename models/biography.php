<?php

require_once 'connectBDD.php';

class biography extends BDD {
//déclaration des attributs identiques à la table `biographies`
    public $idBiography;
    public $present;
    public $profilePicture;
    public $idSpeciality;
    public $idUser;
//-----------------
//PARTIE GENERALE
//-----------------
//  Fonction pour ajouter la bio à un artiste après avoir fait le addUser dans le modèle users.php
    /**
     * 
     * @return type
     */
    public function addBio() {
        $query = 'INSERT INTO `clair_biographies` '
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
//  UPDATE BIO
    /**
     * 
     * @return type
     */
    public function updateBio() {
        $query = 'UPDATE `clair_biographies` '
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
//  EFFACER BIO
    /**
     * 
     * @return type
     */
    public function deleteBio() {
        $query = 'DELETE FROM `clair_biographies` '
                . 'WHERE `idUser` = :idUser';
        $deleteBio = $this->BDD->prepare($query);
        $deleteBio->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        return $deleteBio->execute();
    }
//  Fonction qui liste toutes les bio
    /**
     * 
     * @return type
     */
    public function listBio() {
        $query = 'SELECT * FROM `clair_biographies`';
        $list = $this->BDD->query($query);
        $listBio = $list->fetchAll(PDO::FETCH_OBJ);
        return $listBio;
    }
//  Fonction qui ressort une bio selon l'idUser
    /**
     * 
     * @return type
     */
    public function bioByIdUser() {
        $query = 'SELECT * FROM `clair_biographies` WHERE `idUser` = :idUser';
        $bioByUser = $this->BDD->prepare($query);
        $bioByUser->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        $bioByUser->execute();
        return $bioByUser->fetch(PDO::FETCH_OBJ);
    }    
//  UPDATE PAR ATTRIBUTS
//  Pour le present
    /**
     * 
     * @return type
     */
    public function updatePresent() {
        $query = 'UPDATE clair_biographies '
                . 'SET `present`= :present '
                . 'WHERE `idUser` = :idUser ';
        $updatePresent = $this->BDD->prepare($query);
        $updatePresent->bindValue(':present', $this->present, PDO::PARAM_STR);
        $updatePresent->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        return $updatePresent->execute();
    }    
//  Pour la speciality
    /**
     * 
     * @return type
     */
    public function updateSpeciality() {
        $query = 'UPDATE clair_biographies '
                . 'SET `idSpeciality` = :idSpeciality '
                . 'WHERE `idUser` = :idUser ';
        $updateSpeciality = $this->BDD->prepare($query);
        $updateSpeciality->bindValue(':idSpeciality', $this->idSpeciality, PDO::PARAM_INT);
        $updateSpeciality->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        return $updateSpeciality->execute();
    }
//  Pour la profilePicture
    /**
     * 
     * @return type
     */
    public function updateProfilePicture() {
        $query = 'UPDATE clair_biographies '
                . 'SET `profilePicture` = :profilePicture '
                . 'WHERE `idUser` = :idUser ';
        $updateProfileImage = $this->BDD->prepare($query);
        $updateProfileImage->bindValue(':profilePicture', $this->profilePicture, PDO::PARAM_INT);
        $updateProfileImage->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        return $updateProfileImage->execute();
    }
}
