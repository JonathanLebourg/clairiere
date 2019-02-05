<?php
require 'controllers/listsCtl/listArtWorksCtl.php';
?>

<div class="container">
    <?php foreach ($listArtWorks as $work) { ?>
        <div class="row">
            <div class="col s6 m4">
                <a href="index.php?page=myprofileArtist&id=<?= $work->idUser ?>">
                <img src="./img/artWorks/<?= $work->picture ?>" width=200px/>                    
            </a>
            </div>
            <div class="col s6 m6 offset-m2">
                <div><?= $work->title ?></div>
                <div><?= $work->workStyle ?></div>   
            </div>
        </div>
    <?php } ?>
</div>