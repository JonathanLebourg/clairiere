<?php
require 'controllers/listsCtl/listArtWorksCtl.php';
?>
<div class="container-fluid">
    <hr>
    <h1><b>LEURS OEUVRES</b></h1>
    <hr>
</div>
<div class="container">
    <?php foreach ($listArtWorks as $work) { ?>
        <div class="row">
            <div class="row borderPreAlert3">
                <div class="col s12 m4">
                    <a href="index.php?page=artWork&id=<?= $work->idArtWork ?>">
                        <img class="responsive-img" src="./img/artWorks/<?= $work->picture ?>" width=200px/>
                    </a>                    
                </div>
                <div class="col s12 m8">
                    <div><h1><b><?= $work->title ?></b></h1></div>
                    <hr>
                    <div>
                        <a href="index.php?page=myprofileArtist&id=<?= $work->idUser ?>">
                            <b><?= $work->nickName ?></b>
                        </a>
                    </div>
                    <div><b><?= $work->date ?></b></div>
                    <div><b><?= $work->technicalDescription ?></b></div>
                    <div><?= $work->optionalDescription ?></div>   
                    <div><?= $work->price ?></div> 
                </div>
            </div>
        </div>
    <?php } ?>
</div>