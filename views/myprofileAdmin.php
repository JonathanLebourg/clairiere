<?php
require 'controllers/adminCtl.php';
?>

<div class="row">
    <div class="col s12 m2">
        <div class="row"><button data-target="modalArtist" class="btn waves-effect waves-light modal-trigger more">+ Artiste</button></div>
        <div class="row"><button data-target="modalPicture" class="btn waves-effect waves-light modal-trigger more">+ Dessin</button></div>

    </div>
    <div class="col s12 m10  basic">

        <div class="row">
            <div class="col s12 m12 centered">
                <ul class="tabs">
                    <li class="tab col s4 m4"><a href="#stats">Statistiques Générales</a></li>
                    <li class="tab col s4 m4"><a class="active" href="#artists">Artistes</a></li>
                    <li class="tab col s4 m4"><a href="#clients">Clients</a></li>
                </ul>
            </div>
            <div id="stats" class="col s9 m10 offset-m1 centered">
                <div class="col s12 m10 offset-m1 centered">
                <ul class="tabs">
                    <li class="tab col s3 m3"><a href="#numbers">Chiffres</a></li>
                    <li class="tab col s3 m3"><a class="active" href="#usersList">Liste complète des inscrites</a></li>
                    <li class="tab col s3 m3"><a href="#worksList">Liste complète des oeuvres</a></li>
                </ul>
            </div>          
                <div id="numbers" class="col s12" >
                    <p><?= $countUsers ?> inscrits sur le site</p>
                </div>
                <div id="usersList" class="col s12" >
                    <div class="row">
                        <table id="datatable" class="centered responsive-table">
                            <thead>
                                <tr>
                                    <th><b>Nom</b></th>
                                    <th><b>Prénom</b></th>
                                    <th><b>Pseudo</b></th>
                                    <th><b>Mail</b></th>
                                    <th><b>Type</b></th>
                                    <th><b>Détail</b></th>
                                    <th><b>Supprimer</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($listUsers as $user) {
                                    ?>
                                    <tr>
                                        <td><?= $user->lastName ?></td>
                                        <td><?= $user->firstName ?></td>
                                        <td><?= $user->nickName ?></td>
                                        <td><?= $user->mail ?></td>
                                        <?php if ($user->id_userTypes == 1) { ?>
                                            <td> Administrateur </td> <?php } ?>
                                        <?php if ($user->id_userTypes == 2) { ?>
                                            <td> Artiste </td> <?php } ?>
                                        <?php if ($user->id_userTypes == 3) { ?>
                                            <td> Client </td> <?php } ?>

                                        <?php if ($user->id_userTypes == 2) { ?>
                                            <td> <a href="index.php?page=myprofileArtist&id=<?= $user->id; ?>">
                                                    <i class="tiny material-icons">person</i>
                                                </a> </td> <?php } ?>
                                        <?php if ($user->id_userTypes == 3) { ?>
                                            <td> <a href="index.php?page=myprofileClient&id=<?= $user->id; ?>">
                                                    <i class="tiny material-icons">person</i>
                                                </a> </td> <?php } ?>
                                        <?php if ($user->id_userTypes == 1) { ?>
                                            <td> <a href="index.php?page=admin&id=<?= $user->id; ?>">
                                                    <i class="tiny material-icons">person</i>
                                                </a> </td> <?php } ?>

                                        <td><a href="" data-target="modal<?= $user->id; ?>" class="modal-trigger">
                                                <i class="tiny material-icons">delete</i>
                                            </a></td>
                                    </tr>
                                    <!--Modal Structure--> 
                                <div id="modal<?= $user->id; ?>" class="modal">
                                    <div class="modal-content">
                                        <div class="container">
                                            <h1>SUPPRIMER</h1>
                                            <div class="divider"></div>
                                        </div>
                                        <div class="container">
                                            <p>ATTENTION, action irreversible !!!</p>
                                            <form method="POST" action="index.php?page=admin&id=<?= $user->id; ?>" id="formId<?= $user->id; ?>">
                                                <input  form="formId<?= $user->id; ?>" class="modal-action btn waves-effect waves-light choicebutton delete" type="submit" value="EFFACER PATIENT" name="submit" />
                                            </form>
                                            <div class="row">
                                                <a class="modal-close waves-effect waves-light choicebutton delete">ANNULER</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="worksList" class="col s12" >
                    <p>des count</p>
                </div>
            </div>
            <div id="artists" class="col s12">
                <p>plein de count</p>
            </div>
            <div id="clients" class="col s12">
                <p>plein de count</p>
            </div>
        </div>