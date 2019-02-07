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
            <!--            <div class="col s6 m4">
                            <a href="index.php?page=artWork&id=<?= $work->idArtWork ?>">
                                <img src="./img/artWorks/<?= $work->picture ?>" width=200px/>                    
                            </a>
                        </div>
                        <div class="col s6 m6 offset-m2">
                            <div><?= $work->title ?></div>
                            <div>
                                <a href="index.php?page=myprofileArtist&id=<?= $work->idUser ?>">
            <?= $work->nickName ?>
                                </a>
                            </div>
                            <div><?= $work->workStyle ?></div>
                            <div><?= $work->technic ?></div>
                            <div><?= $work->date ?></div>
                            <div><?= $work->description ?></div>
                        </div>-->
            <div class="row borderArtist">
                <div class="col s6 m4">
                    <a href="index.php?page=artWork&id=<?= $work->idArtWork ?>">
                        <img src="./img/artWorks/<?= $work->picture ?>" width=200px/>
                    </a>                    
                </div>
                <div class="col s6 m8">
                    <div><h1><b><?= $work->title ?></b></h1></div>
                    <hr>
                    <div>
                        <a href="index.php?page=myprofileArtist&id=<?= $work->idUser ?>">
                            <b><?= $work->nickName ?></b>
                        </a>
                    </div>
                    <div><b><?= $work->date ?></b></div>
                    <div><b><?= $work->description ?></b></div>
                    <div><?= $work->technic ?></div>   
                </div>
            </div>
        </div>
    <?php } ?>
</div>