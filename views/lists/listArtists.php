<?php
require 'controllers/listsCtl/listArtistsCtl.php';
?>
<div class="container-fluid">
    <hr>
    <h1><b>NOS ARTISTES</b></h1>
    <hr>
</div>
<div class="container">
    <div class="row">
        <?php foreach ($listArtist as $artist) { ?>  
            <div class="col s12 m4 border hoverable">
                <div class="row imgArtWorkDiv">
                        <img class="responsive-img imgArtWork" src="./img/profilePicture/<?= $artist->profilePicture ?>"/>
                                    
                </div>
                <div class="row">
                    <hr>
                    <div><h2><b><?= $artist->nickName ?></b></h2></div>
                    <hr>
                    <div class="center-align black-text"><p><a href="index.php?page=listArtists&speciality=<?= $artist->speciality ?>">
                                <b><?= $artist->speciality ?></b>
                            </a></p>                                
                    </div>
                    <div><a href="index.php?page=myprofileArtist&id=<?= $artist->idUser ?>" class="btn validateButton">+ de détails</a></div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

