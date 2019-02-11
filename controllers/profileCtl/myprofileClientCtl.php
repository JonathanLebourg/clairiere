<?php

require 'models/users.php';

if (isset($_GET['id'])) {

    $client = new user();
    $client->idUser = $_GET['id'];
    $clientById = $client->userById();

    if (isset($_POST['submitClientModif'])) {

        $clientToModif = new user();
        $clientToModif->idUser = $_GET['id'];

        if (isset($_POST['nickName']) && !empty($_POST['nickName'])) {
            $clientToModif->nickName = $_POST['nickName'];
            $clientToModif->updateUserNickName();
        }
        if (isset($_POST['firstName']) && !empty($_POST['firstName'])) {
            $clientToModif->firstName = $_POST['firstName'];
            $clientToModif->updateUserFirstName();
        }
        if (isset($_POST['lastName']) && !empty($_POST['lastName'])) {
            $clientToModif->lastName = $_POST['lastName'];
            $clientToModif->updateUserLastName();
        }
        if (isset($_POST['mail']) && !empty($_POST['mail'])) {
            $clientToModif->mail = $_POST['mail'];
            $clientToModif->updateUserMail();
        }
        if (isset($_POST['password']) && !empty($_POST['password'])) {
            $clientToModif->password = $_POST['password'];
            $clientToModif->updatePassword();
        }
    }
}
