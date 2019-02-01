<?php
require 'controllers/formsCtl/worksFormController.php';
?>
<div class="container">
    <div class="row">
        <h1>Ajout d'une oeuvre</h1>
        <div class="divider"></div>
    </div>
</div>     
<div class="container">           
    <form class="col s12" method="POST" action="" enctype="multipart/form-data">
        <div class="row">
            <div class="input-field col s12 m6">
                <input name="title" id="title" type="text" class="validate" value="<?= isset($title) ? $title : '' ?>" />
                <label for="title">Titre de l'oeuvre</label>
                <p class="text-danger"><?= isset($formError['title']) ? $formError['title'] : ''; ?></p>
            </div>
            <div class="input-field col s12 m6">
                <select name="workStyle">
                    <option value="" disabled selected>Choisir</option>
                    <?php foreach ($listWorkStyles as $style) { ?>
                        <option value="<?= $style->idWorkStyle ?>"><?= $style->workStyle ?></option>
                    <?php } ?>
                </select>
                <label>Selectionnez le type d'oeuvre</label>
            </div>
            <p class="text-danger"><?= isset($formError['workstyle']) ? $formError['workstyle'] : ''; ?></p>
        </div>
        <div class="row">
            <div class="input-field col s12 m4">
                <input name="technic" id="technic" type="text" class="validate" value="<?= isset($technic) ? $technic : '' ?>" />
                <label for="technic">Dimensions</label>
                <p class="text-danger"><?= isset($formError['technic']) ? $formError['technic'] : ''; ?></p>
            </div>
            <div class="input-field col s12 m4">
                <input name="date" id="date" type="text" class="validate" value="<?= isset($date) ? $date : '' ?>" />
                <label for="date">Date</label>
                <p class="text-danger"><?= isset($formError['date']) ? $formError['date'] : ''; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <div class="file-field input-field">
                    <div class="userchoicebutton btn">
                        <span>Photo de profil</span>
                        <input  type="file" name="fileToUpload" id="fileToUpload">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="jpg, jpeg ou png || 2Mo MAX">
                    </div>
                    <p class="text-danger"><?= isset($formError['fileToUpload']) ? $formError['fileToUpload'] : ''; ?></p>
                    <p class="text-danger"><?= isset($uploadError['NaImage']) ? $uploadError['NaImage'] : ''; ?></p>
                    <p class="text-danger"><?= isset($uploadError['exist']) ? $uploadError['exist'] : ''; ?></p>
                    <p class="text-danger"><?= isset($uploadError['size']) ? $uploadError['size'] : ''; ?></p>
                    <p class="text-danger"><?= isset($uploadError['type']) ? $uploadError['type'] : ''; ?></p>                    
                    <p class="text-danger"><?= isset($uploadError['uploadNotOK']) ? $uploadError['uploadNotOK'] : ''; ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <textarea id="description" class="materialize-textarea" name="description" maxlength="2000"></textarea>
                <label for="description">Texte de présentation ||  <i>2000 caractères MAX.</i>  <span>  <i>* modifiable ultèrieurement</i></span></label>
                <p class="text-danger"><?= isset($formError['description']) ? $formError['description'] : ''; ?></p>
            </div>
        </div>
        <div class="row">
            <button class="userchoicebutton btn waves-effect waves-light" type="submit" name="submit">Envoyer</button>
        </div>
    </form>

</div>