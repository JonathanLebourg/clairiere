<?php
require_once 'models/users.php';
require_once 'models/artWorkInterest.php';

$_SESSION['falseClientId'] = '<p>Vous rencontrez une erreur de connexion ou n\'êtes pas enregistré sur le site<p>';

if (isset($_SESSION['user'])) {

    $interest = new artWorkInterest();
    $interest->idUser = $_SESSION['user']->idUser;
    $listInterest = $interest->ListArtWorkInterestByClient();

    if (isset($_POST['submitClientModif'])) {
        $client = new user();
        ;
        $client->idUser = $_SESSION['user']->idUser;
        if (isset($_POST['nickName']) && !empty($_POST['nickName'])) {
            $client->nickName = $_POST['nickName'];
            $client->updateUserNickName();
        }
        if (isset($_POST['lastName']) && !empty($_POST['lastName'])) {
            $client->lastName = $_POST['lastName'];
            $client->updateUserLastName();
        }
        if (isset($_POST['firstName']) && !empty($_POST['firstName'])) {
            $client->firstName = $_POST['firstName'];
            $client->updateUserFirstName();
        }
        if (isset($_POST['mail']) && !empty($_POST['mail'])) {
            $client->mail = $_POST['mail'];
            $client->updateUserMail();
        }
        $modifiedClient = $client->userById();
        $_SESSION['user'] = $modifiedClient;
        ?> 
        <!--<script>window.location = "http://clairiere/index.php?page=myprofileClient";</script>-->
        <?php
    }

    if (isset($_POST['submitClientPasswordModif'])) {
        if (isset($_POST['password']) && !empty($_POST['password']) && $_SESSION['user']->password = $_POST['password'] && $_POST['passwordNew'] == $_POST['passwordCheck']) {
            $client = new user();
            ;
            $client->idUser = $_SESSION['user']->idUser;
            $client->password = $_POST['passwordNew'];
            $client->updateUserPassword();
            $modifiedClient = $client->userById();
            $_SESSION['user'] = $modifiedClient;
        }
    }

    if (isset($_POST['submitDeleteProfile'])) {
        $client = new user();
        $client->idUser = $_SESSION['user']->idUser;
        $client->deleteUser();
        session_unset();
        session_destroy();
        session_start();
        $_SESSION['deconnectOK'] = '<p> Vous êtes bien déconnecté <p>';
        ?>
        <script>window.location = "http://clairiere/index.php?page=validateDeconnexion";</script>
        <?php
    }

    if (isset($_POST['submitDeleteInterest'])) {
        $interestToDelete = new artWorkInterest();
        $interestToDelete->idArtWorkInterest = htmlspecialchars($_GET['delete']);
        $interestToDelete->deleteArtWorkInterest();
        ?>
        <script>window.location = "http://clairiere/index.php?page=myprofileClient&id=<?= $_SESSION['user']->idUser ?>";</script>
        <?php
    }
}
    
