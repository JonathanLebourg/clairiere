<?php
//Avec le require_once, on appelle le modèle pour reliés les enfants de la classe BDD
require_once 'connectBDD.php';
//On crée la classe user étendue à BDD et permettant ainsi d'accéder aux méthodes magiques et donc à la base de données
class user extends BDD {
//  Déclaration des attributs identiques à la table `clair_users`
    public $idUser;
    public $nickName;
    public $lastName;
    public $firstName;
    public $password;
    public $mail;
    public $idUserType;
//-----------------
//PARTIE GENERALE
//-----------------
//  Fonction qui liste tous les utilisateurs 
//  On utilise un SELECT
//  On y intègre les jointures avec les tables clair_userTypes, clair_biographies et clair_specialities
    /**
     * 
     * @return type
     */
    public function listUsers() {
        $query = 'SELECT *,  `clair_users`.`idUser` AS `userId` FROM `clair_users` '
                . 'INNER JOIN `clair_userTypes` '
                . 'ON `clair_userTypes`.`idUserType` = `clair_users`.`idUserType` '
                . 'LEFT JOIN `clair_biographies` AS t1 '
                . 'ON `t1`.`idUser` = `clair_users`.`idUser` '
                . 'LEFT JOIN `clair_specialities` AS t2 '
                . 'ON `t2`.`idSpeciality` = `t1`.`idSpeciality` ';
        $result = $this->BDD->query($query);
//      On fait un fetchAll afin de récupérer toutes les colonnes de la requête, on l'instancie dans une variable $data
        $data = $result->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }
//  Fonction pour ajouter un utilisateur de type client ou artiste
//  (pour l artiste aller voir aussi la fonction addBio() dans le model biographies)
//  On utilise INSERT INTO et SET 
    /**
     * 
     * @return type
     */
    public function addUser() {
        $query = 'INSERT INTO clair_users '
                . '      SET `lastName`= :lastName, '
                . '      `firstName`= :firstName,'
                . '      `nickName`= :nickName,'
                . '      `password`= :password,'
                . '      `idUserType`= :idUserType,'
                . '      `mail`= :mail';
//      On prépare la requête et on la stocke dans la variable $addUser
        $addUser = $this->BDD->prepare($query);
//      Avec la fonction bindValue, on lie les valeurs en utilsant les marqueurs nominatifs pour associer chaque attribut
        $addUser->bindValue(':lastName', $this->lastName, PDO::PARAM_STR);
        $addUser->bindValue(':firstName', $this->firstName, PDO::PARAM_STR);
        $addUser->bindValue(':nickName', $this->nickName, PDO::PARAM_STR);
        $addUser->bindValue(':password', $this->password, PDO::PARAM_STR);
        $addUser->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $addUser->bindValue(':idUserType', $this->idUserType, PDO::PARAM_INT);
//      on retourne l'execute() 
        return $addUser->execute();
    }
//  FONCTION UPDATE USER
//  On utilise un WHERE pour bien cibler l'user de la table selon son idUser
    /**
     * 
     * @return type
     */
    public function updateUser() {
        $query = 'UPDATE clair_users '
                . 'SET `lastName`= :lastName, '
                . '`firstName`= :firstName, '
                . '`nickName`= :nickName, '
                . '`idUserType`= :idUserType, '
                . '`mail`= :mail '
                . 'WHERE `idUser` = :idUser ';
        $updateUser = $this->BDD->prepare($query);
        $updateUser->bindValue(':lastName', $this->lastName, PDO::PARAM_STR);
        $updateUser->bindValue(':firstName', $this->firstName, PDO::PARAM_STR);
        $updateUser->bindValue(':nickName', $this->nickName, PDO::PARAM_STR);
        $updateUser->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $updateUser->bindValue(':idUserType', $this->idUserType, PDO::PARAM_INT);
        $updateUser->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        return $updateUser->execute();
    }    
//  FONCTION EFFACER
//  On utilise un DELETE et un WHERE pour bien cibler l'user de la table selon son idUser
    /**
     * 
     * @return type
     */
    public function deleteUser() {
        $query = 'DELETE FROM `clair_users` '
                . 'WHERE `idUser` = :idUser';
        $deleteUser = $this->BDD->prepare($query);
        $deleteUser->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        return $deleteUser->execute();
    }
//  Fonction pour vérifier si un utilisateur existe déjà en cherchant avec le pseudo ET le mail
//  On utilise un WHERE et un AND
    /**
     * 
     * @return boolean
     */
    public function alreadyExist() {
        $query = 'SELECT * FROM `clair_users` '
                . '      WHERE `nickName`= :nickName AND `mail`= :mail';
        $alreadyExist = $this->BDD->prepare($query);
        $alreadyExist->bindValue(':nickName', $this->nickName, PDO::PARAM_STR);
        $alreadyExist->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $alreadyExist->execute();
//      On effectue un rowCount et on vérifie si le résultat est égal ou supérieur à 1
        if ($alreadyExist->rowCount() >= 1) {
            $count = TRUE;
        } else {
            $count = FALSE;
        }
//      Si le nombre de ligne trouvées avec la fction rowcount() est 1 ou superieur
//      On retourne TRUE
//      Alors le user existe déjà
        return $count;
    }

//  Fonction pour cibler un utilisateur selon son id
    /**
     * 
     * @return type
     */
    public function userById() {
        $query = 'SELECT *, `clair_users`.`idUser` AS `idUser` FROM `clair_users` '
                . 'INNER JOIN `clair_userTypes`  AS `t1` '
                . 'ON `t1`.`idUserType` = `clair_users`.`idUserType` '
                . 'LEFT JOIN `clair_biographies` AS `t2` '
                . 'ON `t2`.`idUser` = `clair_users`.`idUser` '
                . 'LEFT JOIN `clair_specialities` AS `t3` '
                . 'ON `t3`.`idSpeciality` = `t2`.`idSpeciality` '
                . 'WHERE `clair_users`.`idUser` = :idUser';
        $result = $this->BDD->prepare($query);
        $result->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        $result->execute();
//      On fait un fetch car la requête ne va retourner qu'une colonne
        return $result->fetch(PDO::FETCH_OBJ);       
    }

//-----------------
//PARTIE ARTISTES
//-----------------
//  Fonction qui liste tous les utilisateurs avec un idUserType = 2 donc les artistes
    /**
     * 
     * @return type
     */
    public function listArtists() {
        $query = 'SELECT * FROM `clair_users` '
                . 'INNER JOIN `clair_userTypes` '
                . 'ON `clair_userTypes`.`idUserType` = `clair_users`.`idUserType` '
                . 'LEFT JOIN `clair_biographies` '
                . 'ON `clair_biographies`.`idUser` = `clair_users`.`idUser` '
                . 'LEFT JOIN `clair_specialities` '
                . 'ON `clair_specialities`.`idSpeciality` = `clair_biographies`.`idSpeciality` '
                . 'WHERE `clair_users`.`idUserType` = 2';
        $result = $this->BDD->query($query);
        $data = $result->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }
//  Fonction qui liste les artistes selon leur speciality 
//  Dans le controller listArtistCtl.php, une boucle foreach détermine le $searchOrder
    /**
     * 
     * @param type $searchOrder
     * @return type
     */
    public function listArtistsBySpeciality($searchOrder) {
        $query = 'SELECT * FROM `clair_users` '
                . 'INNER JOIN `clair_userTypes` '
                . 'ON `clair_userTypes`.`idUserType` = `clair_users`.`idUserType` '
                . 'LEFT JOIN `clair_biographies` '
                . 'ON `clair_biographies`.`idUser` = `clair_users`.`idUser` '
                . 'LEFT JOIN `clair_specialities` '
                . 'ON `clair_specialities`.`idSpeciality` = `clair_biographies`.`idSpeciality` '
                . 'WHERE `clair_users`.`idUserType` = 2 '
                . 'AND `clair_biographies`.`idSpeciality` LIKE ' . $searchOrder;
        $result = $this->BDD->query($query);
        $data = $result->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

//  Fonction qui retrouve le dernier inscrit permettant d'ajouter ensuite la biographie grâce à une autre requête dans le modèle biograohy.php
    /**
     * 
     * @return type
     */
    public function lastUser() {
//      On utilise la fonction SQL MAX() qui permet de retrouver le plus grand id et donc le dernier
        $query = 'SELECT MAX(`idUser`) AS `lastId` FROM `clair_users`';
        $result = $this->BDD->query($query);
        $data = $result->fetch(PDO::FETCH_OBJ);
        return $data;
    }
//----------------
//PARTIE STATS
//-----------------
//  Fonction pour compter le nombre d'utilisateurs avec la fonction rowcount()
    /**
     * 
     * @return type
     */
    public function usersCount() {
        $query = 'SELECT * FROM `clair_users`';
        $result = $this->BDD->query($query);
        $result->execute();
        $usersCount = $result->rowCount();
//      On retourne la variable $usersCount qui sera un INTEGER avec le rowCount
        return $usersCount;
    }
//  Fonction pour compter le nombre de clients (idUserType = 3) avec la fonction rowcount()
    /**
     * 
     * @return type
     */
    public function clientsCount() {
        $query = 'SELECT * FROM `clair_users` WHERE `idUserType` = 3 ';
        $result = $this->BDD->query($query);
        $result->execute();
        $usersCount = $result->rowCount();
        return $usersCount;
    }
//  Fonction pour compter le nombre d'artistes (idUserType = 2) avec la fonction rowcount()
    /**
     * 
     * @return type
     */
    public function artistsCount() {
        $query = 'SELECT * FROM `clair_users` WHERE `idUserType` = 2 ';
        $result = $this->BDD->query($query);
        $result->execute();
        $usersCount = $result->rowCount();
        return $usersCount;
    }
//  FONCTIONS UPDATE PAR ATTRIBUT
//  Pour le nickName
    /**
     * 
     * @return type
     */
    public function updateUserNickName() {
        $query = 'UPDATE `clair_users` '
                . 'SET `nickName` = :nickName '
                . 'WHERE `idUser` = :idUser ';
        $updateUserNickName = $this->BDD->prepare($query);
        $updateUserNickName->bindValue(':nickName', $this->nickName, PDO::PARAM_STR);
        $updateUserNickName->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        return $updateUserNickName->execute();
    }
//  Pour le lastName
    /**
     * 
     * @return type
     */
    public function updateUserLastName() {
        $query = 'UPDATE clair_users '
                . 'SET `lastName`= :lastName '
                . 'WHERE `idUser` = :idUser ';
        $updateUserLastName = $this->BDD->prepare($query);
        $updateUserLastName->bindValue(':lastName', $this->lastName, PDO::PARAM_STR);
        $updateUserLastName->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        return $updateUserLastName->execute();
    }
//  Pour le firstName
    /**
     * 
     * @return type
     */
    public function updateUserFirstName() {
        $query = 'UPDATE clair_users '
                . 'SET `firstName`= :firstName '
                . 'WHERE `idUser`= :idUser ';
        $updateUserFirstName = $this->BDD->prepare($query);
        $updateUserFirstName->bindValue(':firstName', $this->firstName, PDO::PARAM_STR);
        $updateUserFirstName->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        return $updateUserFirstName->execute();
    }
//  Pour le mail
    /**
     * 
     * @return type
     */
    public function updateUserMail() {
        $query = 'UPDATE `clair_users` '
                . 'SET `mail`= :mail '
                . 'WHERE `idUser` = :idUser ';
        $updateUserMail = $this->BDD->prepare($query);
        $updateUserMail->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $updateUserMail->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        return $updateUserMail->execute();
    }
//  Pour le password
    /**
     * 
     * @return type
     */
    public function updateUserPassword() {
        $query = 'UPDATE clair_users '
                . 'SET `password`= :password '
                . 'WHERE `idUser` LIKE :idUser ';
        $updateUser = $this->BDD->prepare($query);
        $updateUser->bindValue(':password', $this->password, PDO::PARAM_STR);        
        $updateUser->bindValue(':idUser', $this->idUser, PDO::PARAM_STR);
        return $updateUser->execute();
    }  
//  Fonction pour rechercher l existence du mail pour la connexion et récupérer toutes les informations pour la future session
    /**
     * 
     * @return type
     */
    public function existMailConnexion() {
        $query = 'SELECT *, `clair_users`.`idUser` AS idUser FROM `clair_users` '
                . 'INNER JOIN `clair_userTypes`  AS `t1` '
                . 'ON `t1`.`idUserType` = `clair_users`.`idUserType` '
                . 'LEFT JOIN `clair_biographies` AS `t2` '
                . 'ON `t2`.`idUser` = `clair_users`.`idUser` '
                . 'LEFT JOIN `clair_specialities` AS `t3` '
                . 'ON `t3`.`idSpeciality` = `t2`.`idSpeciality` '
                . 'WHERE `mail` LIKE :mail';
        $existMailConnexion = $this->BDD->prepare($query);
        $existMailConnexion->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $existMailConnexion->execute();
        return $existMailConnexion->fetch(PDO::FETCH_OBJ);
    }
}
