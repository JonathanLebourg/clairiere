<?php

require_once 'connectBDD.php';

class artWork extends BDD {

//  Déclaration des attributs identiques à la table `artWorks`
    public $idArtWork;
    public $title;
    public $technicalDescription;
    public $date;
    public $optionalDescription;
    public $picture;
    public $price;
    public $idUser;
    public $idWorkStyle;
    public $idModality;

//-----------------
//PARTIE GENERALE
//-----------------
//  Fonction pour lister les oeuvres de la table artWorks
    /**
     * 
     * @return type
     */
    public function listArtWorks() {
        $query = 'SELECT * FROM `clair_artWorks` '
                . 'LEFT JOIN `clair_users` AS `t1` '
                . 'ON `clair_artWorks`.`idUser` = `t1`.`idUser` '
                . 'INNER JOIN `clair_workStyles` AS `t2` '
                . 'ON `clair_artWorks`.`idWorkStyle` = `t2`.`idWorkStyle` '
                . 'INNER JOIN `clair_modalities` AS `t3` '
                . 'ON `clair_artWorks`.`idModality` = `t3`.`idModality`';
        $list = $this->BDD->query($query);
        $listArtWorks = $list->fetchAll(PDO::FETCH_OBJ);
        return $listArtWorks;
    }

//  Fonction qui liste les oeuvres selon leur workStyle 
//  Dans le controller listArtWorkCtl.php un foreach détemine le $searchOrder      
    /**
     * 
     * @param type $searchOrder
     * @return type
     */
    public function listArtWorksByStyle($searchOrder) {

        $query = 'SELECT * FROM `clair_artWorks` '
                . 'LEFT JOIN `clair_users` AS `t1` '
                . 'ON `clair_artWorks`.`idUser` = `t1`.`idUser` '
                . 'INNER JOIN `clair_workStyles` AS `t2` '
                . 'ON `clair_artWorks`.`idWorkStyle` = `t2`.`idWorkStyle` '
                . 'INNER JOIN `clair_modalities` AS `t3` '
                . 'ON `clair_artWorks`.`idModality` = `t3`.`idModality` '
                . 'WHERE `t2`.`idWorkStyle` LIKE ' . $searchOrder;
        $list = $this->BDD->query($query);
        $listArtWorksByStyle = $list->fetchAll(PDO::FETCH_OBJ);
        return $listArtWorksByStyle;
    }

//  FONCTION AJOUTER UNE OEUVRE 
    /**
     * 
     * @return type
     */
    public function addArtWork() {
        $query = 'INSERT INTO `clair_artWorks` '
                . '      SET `title`= :title, '
                . '      `technicalDescription`= :technicalDescription,'
                . '      `date`= :date,'
                . '      `optionalDescription`= :optionalDescription,'
                . '      `picture`= :picture, '
                . '      `price`= :price, '
                . '      `idUser`= :idUser,'
                . '      `idWorkStyle`= :idWorkStyle, '
                . '      `idModality`= :idModality ';
        $addArtWork = $this->BDD->prepare($query);
        $addArtWork->bindValue(':title', $this->title, PDO::PARAM_STR);
        $addArtWork->bindValue(':technicalDescription', $this->technicalDescription, PDO::PARAM_STR);
        $addArtWork->bindValue(':date', $this->date, PDO::PARAM_STR);
        $addArtWork->bindValue(':optionalDescription', $this->optionalDescription, PDO::PARAM_STR);
        $addArtWork->bindValue(':picture', $this->picture, PDO::PARAM_STR);
        $addArtWork->bindValue(':price', $this->price, PDO::PARAM_INT);
        $addArtWork->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        $addArtWork->bindValue(':idWorkStyle', $this->idWorkStyle, PDO::PARAM_INT);
        $addArtWork->bindValue(':idModality', $this->idModality, PDO::PARAM_INT);
        return $addArtWork->execute();
    }

//  FONCTION UPDATE UNE OEUVRE 
    /**
     * 
     * @return type
     */
    public function updateArtWorkTitle() {
        $query = 'UPDATE `clair_artWorks` '
                . '      SET `title`= :title '
                . '      WHERE `clair_artWorks`.`idArtWork` = :idArtWork';
        $updateArtWorkTitle = $this->BDD->prepare($query);
        $updateArtWorkTitle->bindValue(':title', $this->title, PDO::PARAM_STR);
        $updateArtWorkTitle->bindValue(':idArtWork', $this->idArtWork, PDO::PARAM_INT);
        return $updateArtWorkTitle->execute();
    }
    public function updateArtWorkTechnicalDescription() {
        $query = 'UPDATE `clair_artWorks` '
                . '      SET `technicalDescription`= :technicalDescription '
                . '      WHERE `clair_artWorks`.`idArtWork` = :idArtWork';
        $updateArtWorkTechnicalDescription = $this->BDD->prepare($query);
        $updateArtWorkTechnicalDescription->bindValue(':technicalDescription', $this->technicalDescription, PDO::PARAM_STR);
        $updateArtWorkTechnicalDescription->bindValue(':idArtWork', $this->idArtWork, PDO::PARAM_INT);
        return $updateArtWorkTechnicalDescription->execute();
    }
    public function updateArtWorkOptionalDescription() {
        $query = 'UPDATE `clair_artWorks` '
                . '      SET `optionalDescription`= :optionalDescription '
                . '      WHERE `clair_artWorks`.`idArtWork` = :idArtWork';
        $updateArtWorkOptionalDescription = $this->BDD->prepare($query);
        $updateArtWorkOptionalDescription->bindValue(':optionalDescription', $this->optionalDescription, PDO::PARAM_STR);
        $updateArtWorkOptionalDescription->bindValue(':idArtWork', $this->idArtWork, PDO::PARAM_INT);
        return $updateArtWorkOptionalDescription->execute();
    }
        public function updateArtWorkPrice() {
        $query = 'UPDATE `clair_artWorks` '
                . '      SET `price`= :price '
                . '      WHERE `clair_artWorks`.`idArtWork` = :idArtWork';
        $updateArtWorkPrice = $this->BDD->prepare($query);
        $updateArtWorkPrice->bindValue(':price', $this->price, PDO::PARAM_STR);
        $updateArtWorkPrice->bindValue(':idArtWork', $this->idArtWork, PDO::PARAM_INT);
        return $updateArtWorkPrice->execute();
    }

    
    
    
    public function updateArtWork() {
        $query = 'UPDATE `clair_artWorks` '
                . '      SET `title`= :title, '
                . '      `technicalDescription`= :technicalDescription,'
                . '      `date`= :date,'
                . '      `optionalDescription`= :optionalDescription,'
                . '      `picture`=:picture, '
                . '      `price`=:price, '
                . '      `idUser`= :idUser,'
                . '      `idWorkStyle`= :idWorkStyle, `idnModality` = :idModality '
                . '      WHERE `clair_artWorks`.`idArtWork` = :id';
        $updateArtWork = $this->BDD->prepare($query);
        $addArtWork->bindValue(':title', $this->title, PDO::PARAM_STR);
        $addArtWork->bindValue(':technicalDescription', $this->technicalDescription, PDO::PARAM_STR);
        $addArtWork->bindValue(':date', $this->date, PDO::PARAM_STR);
        $addArtWork->bindValue(':optionalDescription', $this->optionalDescription, PDO::PARAM_STR);
        $addArtWork->bindValue(':picture', $this->picture, PDO::PARAM_STR);
        $addArtWork->bindValue(':price', $this->price, PDO::PARAM_INT);
        $addArtWork->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        $addArtWork->bindValue(':idWorkStyle', $this->idWorkStyle, PDO::PARAM_INT);
        $addArtWork->bindValue(':idModality', $this->idModality, PDO::PARAM_INT);
        return $updateArtWork->execute();
    }

//  FONCTION EFFACER
    /**
     * 
     * @return type
     */
    public function deleteArtWork() {
        $query = 'DELETE FROM `clair_artWorks` '
                . 'WHERE `idArtWork` = :idArtWork';
        $deleteArtWork = $this->BDD->prepare($query);
        $deleteArtWork->bindValue(':idArtWork', $this->idArtWork, PDO::PARAM_INT);
        return $deleteArtWork->execute();
    }

//  Fonction pour vérifier si un utilisateur existe déjà en cherchant avec le titre ET le nom du fichier
    /**
     * 
     * @return boolean
     */
    public function alreadyExist() {
        $query = 'SELECT * FROM clair_artWorks '
                . ' WHERE `title`= :title AND `picture`= :picture';
        $alreadyExist = $this->BDD->prepare($query);
        $alreadyExist->bindValue(':title', $this->title, PDO::PARAM_STR);
        $alreadyExist->bindValue(':picture', $this->picture, PDO::PARAM_STR);
        $alreadyExist->execute();
        if ($alreadyExist->rowCount() >= 1) {
            $count = TRUE;
        } else {
            $count = FALSE;
        }
        //  si le nombre de ligne trouvées avec la fction rowcount() est 1
//      //  alors le artWork existe déjà
        return $count;
    }

//  Fonction qui liste les oeuvres par artistes
    /**
     * 
     * @return type
     */
    public function artWorkByArtist() {
        $query = 'SELECT * FROM `clair_artWorks` '
                . 'INNER JOIN `clair_users` '
                . 'ON `clair_artWorks`.`idUser` = `clair_users`.`idUser` '
                . 'INNER JOIN `clair_workStyles` '
                . 'ON `clair_artWorks`.`idWorkStyle` = `clair_workStyles`.`idWorkStyle` '
                . 'INNER JOIN `clair_modalities` AS `t3` '
                . 'ON `clair_artWorks`.`idModality` = `t3`.`idModality` '
                . 'WHERE `clair_artWorks`.`idUser` = :idUser';
        $listByArtist = $this->BDD->prepare($query);
        $listByArtist->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        $listByArtist->execute();
        $artWorkByArtist = $listByArtist->fetchAll(PDO::FETCH_OBJ);
        return $artWorkByArtist;
    }

//   Fonction pour acceder aux attributs d'une oeuvre selon son idArtWork
    /**
     * 
     * @return type
     */
    public function SeeArtWork() {
        $query = 'SELECT * FROM `clair_artWorks` '
                . 'INNER JOIN `clair_users` '
                . 'ON `clair_artWorks`.`idUser` = `clair_users`.`idUser` '
                . 'INNER JOIN `clair_workStyles` '
                . 'ON `clair_artWorks`.`idWorkStyle` = `clair_workStyles`.`idWorkStyle` '
                . 'INNER JOIN `clair_modalities` AS `t3` '
                . 'ON `clair_artWorks`.`idModality` = `t3`.`idModality` '
                . 'WHERE `clair_artWorks`.`idArtWork` = :idArtWork';
        $artWork = $this->BDD->prepare($query);
        $artWork->bindValue(':idArtWork', $this->idArtWork, PDO::PARAM_INT);
        $artWork->execute();
        $artWorkById = $artWork->fetch(PDO::FETCH_OBJ);
        return $artWorkById;
    }

//-----------------
//----STATS
//-----------------
//  Fonction pour compter le nombre d'oeuvres avec la fonction rowcount()
    /**
     * 
     * @return type
     */
    public function artWorksCount() {
        $query = 'SELECT * FROM `clair_artWorks` ';
        $result = $this->BDD->query($query);
        $result->execute();
        $artWorksCount = $result->rowCount();
        return $artWorksCount;
    }

//  Fonction pour compter le nombre d'oeuvres par artiste avec la fonction rowcount()
    /**
     * 
     * @return type
     */
    public function artWorksCountByArtist() {
        $query = 'SELECT * FROM `clair_artWorks` WHERE `clair_artWorks`.`idUser` = :idUser';
        $result = $this->BDD->query($query);
        $result->execute();
        $artWorksCountByArtist = $result->rowCount();
        return $artWorksCountByArtist;
    }

}
