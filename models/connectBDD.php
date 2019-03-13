<?php
//on crée la classe BDD qui nous permettra de se connecter à la base données
class BDD {
//On crée l'attribut $BDD quo'on definit comme public pour le rendre disponible à ses enfants (les tables)
  public $BDD;
//On crée la méthode magique __construct pour se connecter à la base de données mySQL
  public function __construct() {
//    Dans le try, on essaie en crée un nouvel objet PDO avec les informations de connexion
//    On y ajoute aussi le tableau d'erreur pour nous aider leur développement
      try {
           $this->BDD = new PDO('mysql:host=localhost;dbname=clairierePRO;charset=utf8','jonathan','admin', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));  
//    En cas d'erreur, le catch permet de stocker l'exeption dans une variable $error
      } catch (Exception $error) {         
//        On arrête le script via un die et on affiche l'eereur grace à la méthode getMessage()
          die('Erreur de connexion : ' . $error ->getMessage());
      }  
  }
//On crée la méthode magique __destruct() qui réinstancie notre objet à une valeur NULL et permet ainsi la déconnexion à la base de données  
  public function __destruct() {
      $this->BDD = NULL;
  }
}
