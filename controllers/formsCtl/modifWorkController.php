
<?php
require 'models/artWorks.php';

if (isset($_SESSION['user'])) {
    $artWork = new artWork();
    $artWork->idArtWork = $_GET['id'];
    $workById = $artWork->SeeArtWork();
    
    if (isset($_POST['submitArtworkModif'])) {
        $artworkToModif = new artWork();
        $artworkToModif->idArtWork = $_GET['id'];
        if (isset($_POST['title']) && !empty($_POST['title'])) {
            $artworkToModif->title = $_POST['title'];
            $artworkToModif->updateArtWorkTitle();
        }
        if (isset($_POST['technicalDescription']) && !empty($_POST['technicalDescription'])) {
            $artworkToModif->technicalDescription = $_POST['technicalDescription'];
            $artworkToModif->updateArtWorkTechnicalDescription();
        }
        if (isset($_POST['optionalDescription']) && !empty($_POST['optionalDescription'])) {
            $artworkToModif->optionalDescription = $_POST['optionalDescription'];
            $artworkToModif->updateArtWorkOptionalDescription();
        }
        if (isset($_POST['date']) && !empty($_POST['date'])) {
            $artworkToModif->date = $_POST['date'];
            $artworkToModif->updateArtWorkDate();
        }
        if (isset($_POST['price']) && !empty($_POST['price'])) {
            $artworkToModif->price = $_POST['price'];
            $artworkToModif->updateArtWorkPrice();
        }
    }
    ?>
    <script>window.location = "http://clairiere/index.php?page=artWork&id=<?= $_get['id'] ?>";</script>
    <?php
}

