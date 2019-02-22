<?php
require_once 'models/users.php';
require_once 'models/biography.php';
//require 'models/specialities.php';

$artist = new user();
$artist->idUserType = 2;
$artist->idUser = $_GET['id'];
$artistById = $artist->userById();

$speciality = new speciality();
$listSpeciality = $speciality->listSpec();
//Déclaration des regex
//Déclaration regex nom
$regexName = '/^[A-zà-Ÿ -\']+$/';
//Déclaration regex nom
$regexPseudo = '/^[0-9a-zA-Zà-Ÿ\-\']+$/';
//Déclaration regex password
$regexPassword = '/^[0-9a-zA-Z]{8,12}+$/';
//Déclaration regex mail
$regexMail = '/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/';
//déclaration d'un tableau d'érreur
$formError = [];
$modifOK = TRUE;


if (isset($_SESSION['user'])) {
    if (isset($_POST['submitArtistModif'])) {
        $artistToModif = new user();
        $artistToModif->idUser = $_SESSION['user']->idUser;
        $bioToModif = new biography();
        $bioToModif->idUser = $_SESSION['user']->idUser;

        if (isset($_POST['nickName']) && !empty($_POST['nickName'])) {
            $artistToModif->nickName = $_POST['nickName'];
            $artistToModif->updateUserNickName();
        }
        if (isset($_POST['lastName']) && !empty($_POST['lastName'])) {
            $artistToModif->lastName = $_POST['lastName'];
            $artistToModif->updateUserLastName();
        }
        if (isset($_POST['firstName']) && !empty($_POST['firstName'])) {
            $artistToModif->firstName = $_POST['firstName'];
            $artistToModif->updateUserFirstName();
        }
        if (isset($_POST['mail']) && !empty($_POST['mail'])) {
            $artistToModif->mail = $_POST['mail'];
            if (!preg_match($regexMail, $mail)) {
                //stocker dans le tableau le rapport d'erreur
                $formError['mail'] = 'Mail incorrect';
            } else {
                $artistToModif->updateUserMail();
            }
        }
        if (isset($_POST['present']) && !empty($_POST['present'])) {
            $bioToModif->present = $_POST['present'];
            $bioToModif->updatePresent();
        }
        if (isset($_POST['speciality']) && !empty($_POST['speciality'])) {
            $bioToModif->idSpeciality = $_POST['speciality'];
            $bioToModif->updateSpeciality();
        }
        if (!empty($_FILES['fileToUpload']['name'])) {
            $uploadError = [];

            $fileToUpload = $_FILES['fileToUpload'];
            $file = pathinfo($_FILES['fileToUpload']['name']);

            $target_dir = "./img/profilePicture/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadError['NaImage'] = 'Le fichier n\'est pas une image';
                $uploadOk = 0;
            }
// Check if file already exists
            if (file_exists($target_file)) {
                $uploadError['exist'] = 'Ce fichier existe déjà';
                $uploadOk = 0;
            }
// Check file size
            if ($_FILES["fileToUpload"]["size"] > 2000000) {
                $uploadError['size'] = 'Fichier trop lourd';
                $uploadOk = 0;
            }
// Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                $uploadError['type'] = 'Uniquement les extensions JPG, JPEG, PNG & GIF sont autorisées';
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $uploadError['uploadNotOK'] = 'Fichier non-enregistré';
// if everything is ok, try to upload file
            } else {
                if (count($uploadError) == 0) {
                    $fileToDelete = './img/profilePicture/' . $_SESSION['user']->profilePicture;
                    unlink($fileToDelete);

                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        $modifOK = TRUE;
                        $bioToModif->profilePicture = $file['basename'];
                        $bioToModif->updateProfilePicture();
                        ?> 
                         <?php
                    } else {
                        echo "Désolé, une erreur a eu lieu lors du téléchargement";
                    }
                }
            }
        }


        $modifiedArtist = $artistToModif->userById();
        $_SESSION['user'] = $modifiedArtist;
        ?>
       <?php
    }
}
?>
