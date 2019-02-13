<?php

require_once 'connectBDD.php';

class artWorkInterest extends BDD {

//déclaration des attributs identiques à la table `artWorks`
    public $idArtWorkInterest;
    public $idArtWork;
    public $idUser;

    public function newArtWorkInterest() {
        $query = 'INSERT INTO `clair_artWorkInterest` '
                . '      SET `idArtWork`= :idArtWork, '
                . '      `idUser`= :idUser';
        $newArtWorkInterest = $this->BDD->prepare($query);
        $newArtWorkInterest->bindValue(':idArtWork', $this->idArtWork, PDO::PARAM_INT);
        $newArtWorkInterest->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        return $newArtWorkInterest->execute();
    }

    public function ListArtWorkInterestByClient() {
        $query = 'SELECT * FROM `clair_artWorkInterest` '
                . 'INNER JOIN `clair_artWorks` '
                . 'ON `clair_artWorks`.`idArtWork` = `clair_artWorkInterest`.`idArtWork` '
                . 'WHERE `clair_artWorkInterest`.`idUser` = :idUser';
        $ListArtWorkInterestByClient = $this->BDD->prepare($query);
        $ListArtWorkInterestByClient->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        $ListArtWorkInterestByClient->execute();
        return $ListArtWorkInterestByClient->fetchAll(PDO::FETCH_OBJ);
    }

    public function ListClientInterestByArtWork() {
        $query = 'SELECT * FROM `clair_artWorkInterest` WHERE `idArtWork` = :idArtWork';
        $ListArtWorkInterestByClient = $this->BDD->prepare($query);
        $ListArtWorkInterestByClient->bindValue(':idArtWork', $this->idArtWork, PDO::PARAM_INT);
        $ListArtWorkInterestByClient->execute();
        return $ListArtWorkInterestByClient->fetchAll(PDO::FETCH_OBJ);
    }

}
?>
