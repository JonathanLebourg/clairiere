        <?php
require_once 'models/workStyles.php';
require_once 'models/artWorks.php';

$workStyle = new workStyle();
$listWorkStyles = $workStyle->listStyles();

$artWork = new artWork();

//Déclaration des regex
//Déclaration regex nom
$regexText = '/^[A-zà-Ÿ -\'\!,;.:?]+$/';
//Déclaration regex nom
$regexTextAndNumber = '/^[0-9a-zA-Zà-Ÿ\- \!\',;.:?]+$/';
//Déclaration regex password
$regexDate = '/^[0-9]{4}+$/';
$formError = [];
$addOK = TRUE;

if (isset($_POST['title'])) {
    //déclarion de la variable pseudo avec le htmlspecialchar 
    $title = htmlspecialchars($_POST['title']);
    //test de la regex si elle est invalide
    if (!preg_match($regexText, $title)) {
        //stocker dans le tableau le rapport d'erreur
        $formError['title'] = 'Saisie invalide';
    }
    // verifie si le champs de nom et vide
    if (empty($title)) {
        //stocker dans le tableau le rapport d'érreur
        $formError['title'] = 'Champ obligatoire';
    }
}

if (isset($_POST['technicalDescription'])) {
    //déclarion de la variable pseudo avec le htmlspecialchar 
    $technicalDescription = htmlspecialchars($_POST['technicalDescription']);
    //test de la regex si elle est invalide
    if (!preg_match($regexTextAndNumber, $_POST['technicalDescription'])) {
        //stocker dans le tableau le rapport d'erreur
        $formError['technicalDescription'] = 'Saisie invalide';
    }
    // verifie si le champs de nom et vide
    if (empty($_POST['technicalDescription'])) {
        //stocker dans le tableau le rapport d'érreur
        $formError['technicalDescription'] = 'Champ obligatoire';
    }
}
if (isset($_POST['date'])) {
    //déclarion de la variable password avec le htmlspecialchar 
    $date = htmlspecialchars($_POST['date']);
    //test de la regex si elle est invalide
    if (!preg_match($regexDate, $date)) {
        //stocker dans le tableau le rapport d'erreur
        $formError['date'] = 'date incorrect';
    }
    // verifie si le champs de nom et vide
    if (empty($_POST['date'])) {
        //stocker dans le tableau le rapport d'érreur
        $formError['date'] = 'Champ obligatoire';
    }
}


if (isset($_POST['workStyle'])) {
    //déclarion de la variable town avec le htmlspecialchar 
    $workStyle = htmlspecialchars($_POST['workStyle']);
} else {
    $formError['workStyle'] = 'Choix obligatoire';
}

if (isset($_POST['optionalDescription'])) {
    //déclarion de la variable town avec le htmlspecialchar 
    $optionalDescription = htmlspecialchars($_POST['optionalDescription']);
    //test de la regex si elle est invalide
    if (strlen($optionalDescription) > 2000) {
        //stocker dans le tableau le rapport d'erreur
        $formError['optionalDescription'] = '2 000 caractères maximum';
    }
    if (empty($_POST['optionalDescription'])) {
        //stocker dans le tableau le rapport d'érreur
        $formError['optionalDescription'] = 'Champ obligatoire';
    }
}
//if (empty($_POST['fileToUpload'])) {
//    $formError['fileToUpload'] = 'Image obligatoire';
//}
if (isset($_POST['submit']) && !empty($_FILES['fileToUpload']['name'])) {
 
    $uploadError = [];

    $fileToUpload = $_FILES['fileToUpload'];
    $file = pathinfo($_FILES['fileToUpload']['name']);

    $target_dir = "./img/artWorks/";
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
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        $uploadError['size'] = 'Fichier trop lourd';
        $uploadOk = 0;
    }
// Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $uploadError['type'] = 'Uniquement les extensions JPG, JPEG, PNG & GIF sont autorisées';
        $uploadOk = 0;
    }
//    if ($check['0'] != $check['1']) {
//        echo "format carré demandé";
//        $uploadOk = 0;
//    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $uploadError['uploadNotOK'] = 'Fichier non-enregistré';
// if everything is ok, try to upload file
    } else {
        if (count($uploadError) == 0 && count($formError) == 0) {
            
            $artWork->title = $title;
            $artWork->technicalDescription = $technicalDescription;
            $artWork->date = $date;
            $artWork->optionalDescription = $optionalDescription;
            $artWork->picture = $file['basename'];
            $artWork->idUser = $_GET['id'];
            $artWork->idWorkStyle = $workStyle;
            $artWork->idModality = $modality;
            
            $exist = $artWork->alreadyExist();
            
            if ($exist == TRUE) {
                $addOK = FALSE;
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $addOK = TRUE;
                    $artWork->addArtWork();
                } else {
                    echo "Désolé, une erreur a eu lieu lors du téléchargement";
                }
            }
        }
    }
}
?>
