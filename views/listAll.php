<?php
require 'controllers/listCtl.php';
?>

<div class="row">
    <?php    foreach ($listUsers as $user){ ?>
            <div class="col s12 m3">
                <div class="card white darken-1 hoverable">
                    <div class="content1 card-content black-text">
                        <img src="./img/profilePicture/<?= $user->profilePicture ?>" width=65%/>                    
                    </div>

                </div>
            </div>
            <div class="col s12 m9">
                <div class="card white darken-1 hoverable">
                    <div class="content1 card-content black-text">
                        <span class="card-title left-align"><b><?= $user->nickName ?></b></span>
                        <span class="card-title left-align"><b><?= $user->firstName . ' ' . $user->lastName?></b></span>
                        <span class="card-title left-align"><i><?= $user->speciality ?></i></span>
                        <p><?= $user->present ?></p>
                        <span class="card-title left-align"><a class=" black-text" href="http://www.paris-art.com/philippe-ramette-8/"><i>Site perso</i></a></span>
                    </div>
                </div>
            </div>
    <?php } ?>
        </div>