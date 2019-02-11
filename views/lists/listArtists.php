<?php
require 'controllers/listsCtl/listArtistsCtl.php';
?>
<div class="container-fluid">
    <hr>
    <h1><b>NOS ARTISTES</b></h1>
    <hr>
</div>
<div class="container">
    <?php foreach ($listArtist as $artist) { ?>
        <a class="black-text" href="index.php?page=myprofileArtist&id=<?= $artist->idUser ?>">
            <div class="row borderPreAlert2">
                <div class="col s10 offset-s1 m4">
                    <img class="profilePicture responsive-img" src="./img/profilePicture/<?= $artist->profilePicture ?>" width=200px/>                    
                </div>
                <div class="col s10 offset-s1 m8">
                    <div><h1><b><?= $artist->nickName ?></b></h1></div>
                    <hr>
                    <div><b><?= $artist->speciality ?></b></div>
                    <div><?= $artist->present ?></div>   
                </div>
            </div>
        </a>
    <?php } ?>
</div>

