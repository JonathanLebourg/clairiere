<?php

require_once 'connectBDD.php';

class artWorkInterest extends BDD {

//  Déclaration des attributs identiques à la table `artWorkInterest`
    public $idArtWorkInterest;
    public $idArtWork;
    public $idUser;
//  Fonction pour créer un nouvel intérêt
    /**
     * 
     * @return type
     */
    public function newArtWorkInterest() {
        $query = 'INSERT INTO `clair_artWorkInterest` '
                . '      SET `idArtWork`= :idArtWork, '
                . '      `idUser`= :idUser';
        $newArtWorkInterest = $this->BDD->prepare($query);
        $newArtWorkInterest->bindValue(':idArtWork', $this->idArtWork, PDO::PARAM_INT);
        $newArtWorkInterest->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        return $newArtWorkInterest->execute();
    }
//  FONCTION EFFACER
    /**
     * 
     * @return type
     */
    public function deleteArtWorkInterest() {
        $query = 'DELETE FROM `clair_artWorkInterest` '
                . '      WHERE `idArtWorkInterest`= :idArtWorkInterest';
        $deleteArtWorkInterest = $this->BDD->prepare($query);
        $deleteArtWorkInterest->bindValue(':idArtWorkInterest', $this->idArtWorkInterest, PDO::PARAM_INT);
        return $deleteArtWorkInterest->execute();
    }
//  Fonction qui vérifie si un intérêt existe déjà
    /**
     * 
     * @return boolean
     */
    public function alreadyExistArtWorkInterest() {
        $query = 'SELECT * FROM `clair_artWorkInterest` '
                . '      WHERE `idArtWork`= :idArtWork '
                . '      AND `idUser`= :idUser';
        $alreadyExistArtWorkInterest = $this->BDD->prepare($query);
        $alreadyExistArtWorkInterest->bindValue(':idArtWork', $this->idArtWork, PDO::PARAM_INT);
        $alreadyExistArtWorkInterest->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        $alreadyExistArtWorkInterest->execute();
//      On effectue un rowCount et on vérifie si le résultat est égal ou supérieur à 1
        if ($alreadyExistArtWorkInterest->rowCount() >= 1) {
            $count = TRUE;
        } else {
            $count = FALSE;
        }
//      Si le nombre de ligne trouvées avec la fction rowcount() est 1 ou superieur
//      Return TRUE
//      Alors le art existe déjà
        return $count;
    }    
//  Fonction qui liste les intérêts par client
    /**
     * 
     * @return type
     */
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
 //  Fonction qui liste les intérêts par oeuvre
    /**
     * 
     * @return type
     */
    public function ListClientInterestByArtWork() {
        $query = 'SELECT * FROM `clair_artWorkInterest` WHERE `idArtWork` = :idArtWork';
        $ListArtWorkInterestByClient = $this->BDD->prepare($query);
        $ListArtWorkInterestByClient->bindValue(':idArtWork', $this->idArtWork, PDO::PARAM_INT);
        $ListArtWorkInterestByClient->execute();
        return $ListArtWorkInterestByClient->fetchAll(PDO::FETCH_OBJ);
    }
//  Fonction qui liste les intérêts par artiste
    /**
     * 
     * @return type
     */
    public function ListArtWorkInterestByArtist() {
        $query = 'SELECT * FROM `clair_artWorkInterest` '
                . 'INNER JOIN `clair_artWorks` '
                . 'ON `clair_artWorks`.`idArtWork` = `clair_artWorkInterest`.`idArtWork` '
                . 'INNER JOIN `clair_users` '
                . 'ON `clair_users`.`idUser` = `clair_artWorks`.`idUser` '
                . 'WHERE `clair_artWorkInterest`.`idArtWork` = :idArtWork';
        $ListArtWorkInterestByArtist = $this->BDD->prepare($query);
        $ListArtWorkInterestByArtist->bindValue(':idArtWork', $this->idArtWork, PDO::PARAM_INT);
        $ListArtWorkInterestByArtist->execute();
        $count = $ListArtWorkInterestByArtist->rowCount();
        return $count;
    }    
//    public function getInterestedByArtWorkId($idArtWork) {
//        $req = $this->BDD->prepare('SELECT idArtWorlInterest FROM clair_artWorkInterest WHERE idArtWork = ?');
//        $req = $req->execute([$idArtWork]);
//        return $req->rowCount();
//    }
}
