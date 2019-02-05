<?php

require_once 'connectBDD.php';

class artWork extends BDD {

    public $idArtWork;
    public $title;
    public $technic;
    public $date;
    public $description;
    public $picture;
    public $idUser;
    public $idWorkStyle;

//**-----------------
//*PARTIE GENERALE
//**-----------------
//super requete à jointures avec tout de tout le monde
//-----------------------------------------------
//"SELECT * FROM clairiere.Users INNER JOIN userTypes ON userTypes.id = Users.id_userTypes LEFT JOIN biography ON biography.id_Users = Users.id LEFT JOIN specialities ON specialities.id = biography.id_specialities";

    public function listArtWorks() {
        $query = "SELECT * FROM clair_artWorks "
                . "LEFT JOIN clair_users as t1 "
                . "ON clair_artWorks.idUser = t1.idUser "
                . "INNER JOIN clair_workStyles as t2 "
                . "ON clair_artWorks.idWorkStyle = t2.idWorkStyle ";
        $result = $this->BDD->query($query);
        $data = $result->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

   
    public function listArtWorksByStyle($searchOrder) {
        $query = "SELECT * FROM clair_artWorks "
                . "LEFT JOIN clair_users as t1 "
                . "ON clair_artWorks.idUser = t1.idUser "
                . "INNER JOIN clair_workStyles as t2 "
                . "ON clair_artWorks.idWorkStyle = t2.idWorkStyle "
                . "WHERE t2.idWorkStyle LIKE $searchOrder";
        $result = $this->BDD->query($query);
        $data = $result->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }


    public function addArtWork() {
        $query = 'INSERT INTO clair_artWorks '
                . '      SET `title`= :title, '
                . '      `technic`= :technic,'
                . '      `date`= :date,'
                . '      `description`= :description,'
                . '      `picture`=:picture,'
                . '      `idUser`= :idUser,'
                . '      `idWorkStyle`= :idWorkStyle';

        $addArtWork = $this->BDD->prepare($query);
        $addArtWork->bindValue(':title', $this->title, PDO::PARAM_STR);
        $addArtWork->bindValue(':technic', $this->technic, PDO::PARAM_STR);
        $addArtWork->bindValue(':date', $this->date, PDO::PARAM_STR);
        $addArtWork->bindValue(':description', $this->description, PDO::PARAM_STR);
        $addArtWork->bindValue(':picture', $this->picture, PDO::PARAM_STR);
        $addArtWork->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        $addArtWork->bindValue(':idWorkStyle', $this->idWorkStyle, PDO::PARAM_STR);
        return $addArtWork->execute();
    }
    
    public function updateArtWork() {
        $query = 'UPDATE clair_artWorks '
                . '      SET `title`= :title, '
                . '      `technic`= :technic,'
                . '      `date`= :date,'
                . '      `description`= :description,'
                . '      `picture`=:picture,'
                . '      `idUser`= :idUser,'
                . '      `idWorkStyle`= :idWorkStyle'
                . '      WHERE `clair_artWorks`.`idArtWork` = :id';

        $updateArtWork = $this->BDD->prepare($query);
        $updateArtWork->bindValue(':title', $this->title, PDO::PARAM_STR);
        $updateArtWork->bindValue(':technic', $this->technic, PDO::PARAM_STR);
        $updateArtWork->bindValue(':date', $this->date, PDO::PARAM_STR);
        $updateArtWork->bindValue(':description', $this->description, PDO::PARAM_STR);
        $updateArtWork->bindValue(':picture', $this->picture, PDO::PARAM_STR);
        $updateArtWork->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        $updateArtWork->bindValue(':idWorkStyle', $this->idWorkStyle, PDO::PARAM_STR);
        $updateArtWork->bindValue(':id', $this->idArtWork, PDO::PARAM_INT);
        return $updateArtWork->execute();
    }
    

    public function deleteArtWork() {
        $query = 'DELETE FROM `clair_artWorks`
                WHERE `idArtWork` = :idArtWork';
        $deleteArtWork = $this->BDD->prepare($query);
        $deleteArtWork->bindValue(':idArtWork', $this->idArtWork, PDO::PARAM_INT);
        return $deleteArtWork->execute();
    }

    public function alreadyExist() {
        $query = 'SELECT * FROM clair_artWorks '
                . '      WHERE `title`= :title AND `picture`= :picture';
        $alreadyExist = $this->BDD->prepare($query);
        $alreadyExist->bindValue(':title', $this->title, PDO::PARAM_STR);
        $alreadyExist->bindValue(':picture', $this->picture, PDO::PARAM_STR);
        $alreadyExist->execute();
        if ($alreadyExist->rowCount() >= 1) {
            $count = TRUE;
        } else {
            $count = FALSE;
        }
        return $count;
    }

    public function artWorkByArtist() {
        $query = "SELECT * FROM clair_artWorks "
                . "INNER JOIN clair_users "
                . "ON clair_artWorks.idUser = clair_users.idUser "
                . "INNER JOIN clair_workStyles "
                . "ON clair_artWorks.idWorkStyle = clair_workStyles.idWorkStyle "
                . "WHERE clair_artWorks.idUser = :idUser";
        $result = $this->BDD->prepare($query);
        $result->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        $result->execute();
        $data = $result->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

     public function SeeArtWork() {
        $query = "SELECT * FROM clair_artWorks "
                . "INNER JOIN clair_users "
                . "ON clair_artWorks.idUser = clair_users.idUser "
                . "INNER JOIN clair_workStyles "
                . "ON clair_artWorks.idWorkStyle = clair_workStyles.idWorkStyle "
                . "WHERE clair_artWorks.idArtWork = :idArtWork";
        $result = $this->BDD->prepare($query);
        $result->bindValue(':idArtWork', $this->idArtWork, PDO::PARAM_INT);
        $result->execute();
        $data = $result->fetch(PDO::FETCH_OBJ);
        return $data;
    }
}
