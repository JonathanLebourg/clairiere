<?php
$lastName = htmlspecialchars($_POST['lastName']);
$firstName = htmlspecialchars($_POST['firstName']);
$pseudo = htmlspecialchars($_POST['pseudo']);
$mail = htmlspecialchars($_POST['mail']);
$password = htmlspecialchars($_POST['password']);
$passwordCheck = htmlspecialchars($_POST['passwordCheck']);
?>
<div class="container">
    <h1 class="result">Bien le bonjour <?= $firstName . ' ' . $lastName; ?> aka <b><?= $pseudo; ?></b></h1>
    <hr>
    <p>Vous êtes bien inscrit.</p>
</div>
<div class="container">
    <h2>Récapitulatif de vos informations de connexion</h2>
    <hr>
    <p>
    <ul>
        <li>Nom : <?= $lastName ?></li>
        <li>Prénom : <?= $firstName ?></li>
        <li>Votre pseudo : <?= $pseudo ?></li>
        <li>Mail : <?= $mail ?></li>
        <li>Votre mot de passe : <?= $password ?></li>
    </ul>
</div>