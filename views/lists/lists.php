<?php
require 'controllers/listsCtl/listsCtl.php';
?>

<div class="container">
    <?php foreach ($listArtist as $artist) { ?>
        <div class="row">
            <div class="col s6 m4">
                <img src="./img/profilePicture/<?= $artist->profilePicture ?>" width=200px/>                    
            </div>
            <div class="col s6 m6 offset-m2">
                <div><?= $artist->nickName ?></div>
                <div><?= $artist->speciality ?></div>
                <div><?= $artist->present ?></div>   
            </div>
        </div>
    <?php } ?>
</div>

