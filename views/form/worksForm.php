<?php
require 'controllers/formsCtl/worksFormController.php';
?>
<div class="container-fluid">
    <div class="row">
        <hr>
        <h1><b>Ajout d'une oeuvre</b></h1>
        <hr>
        <div class="border col s8 offset-s2 m6 offset-m3">
            <p>Vous êtes invitez à suivre au mieux les recommandations afin de permettre à votre travail
                de rencontrer le plus de succès possible</p>
        </div>
    </div>
</div>     
<div class="container">           
    <form class="col s12" method="POST" action="" enctype="multipart/form-data" runat="server">
        <div class="row">
            <div class="input-field col s12 m9">
                <input name="title" id="title" type="text" class="validate" value="<?= isset($artWork->title) ? $artWork->title : '' ?>" />
                <label for="title">Titre de l'oeuvre</label>
                <p class="text-danger"><?= isset($formError['title']) ? $formError['title'] : ''; ?></p>
            </div>
            <div class="input-field col s12 m3">
                <select name="workStyle">
                    <option value="" disabled selected>Choisir</option>
                    <?php foreach ($listWorkStyles as $style) { ?>
                        <option value="<?= $style->idWorkStyle ?>"><?= $style->workStyle ?></option>
                    <?php } ?>
                </select>
                <label>Selectionnez le type d'oeuvre</label>
                <p class="text-danger"><?= isset($formError['workstyle']) ? $formError['workstyle'] : ''; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m12">
                <div class="file-field input-field col s6 m6">


                    <div class="validateButton btn">
                        <span>Image</span>
                        <input  type="file" name="fileToUpload" id="fileToUpload" accept="image/*">
                    </div>

                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="jpg, jpeg ou png || 2Mo MAX">
                    </div>
                </div>
                <div class="col s6 m6">
                    <img src="" id="output" class="responsive-img" alt="aperçu de l'image" />
                </div>
                <div class="error">
                    <p class="text-danger"><?= isset($formError['fileToUpload']) ? $formError['fileToUpload'] : ''; ?></p>
                    <p class="text-danger"><?= isset($uploadError['NaImage']) ? $uploadError['NaImage'] : ''; ?></p>
                    <p class="text-danger"><?= isset($uploadError['exist']) ? $uploadError['exist'] : ''; ?></p>
                    <p class="text-danger"><?= isset($uploadError['size']) ? $uploadError['size'] : ''; ?></p>
                    <p class="text-danger"><?= isset($uploadError['type']) ? $uploadError['type'] : ''; ?></p>                    
                    <p class="text-danger"><?= isset($uploadError['uploadNotOK']) ? $uploadError['uploadNotOK'] : ''; ?></p>
                </div>
            </div>
        </div>
</div>

<div class="row">
    <div class="border col s8 offset-s2 m6 offset-m3">
        <p>Le reste de ces informations est facultatif 
            bien qu'il est recommandé de renseigner le plus de champs possibles</p>
        <p>(de plus, toutes les informations restent modifiables par la suite)</p>
    </div>
</div>
<div class="row">
    <div class="input-field col s12 m12">
        <input name="technicalDescription" id="technicalDescription" type="text" class="validate" value="<?= isset($artWork->technicalDescription) ? $artWork->technicalDescription : '' ?>" />
        <label for="technicalDescription">Description technique (dimensions, matières, techniques, etc...)  ||  <i>2000 caractères MAX.</i></label>
        <p class="text-danger"><?= isset($formError['technicalDescription']) ? $formError['technicalDescription'] : ''; ?></p>
    </div>
    <div class="input-field col s12">
        <textarea id="optionalDescription" class="materialize-textarea" name="optionalDescription" maxlength="2000"></textarea>
        <label for="optionalDescription">Informations complémentaires de votre choix ||  <i>2000 caractères MAX.</i></label>
        <p class="text-danger"><?= isset($formError['optionalDescription']) ? $formError['optionalDescription'] : ''; ?></p>
    </div>

</div>
<div class="row">
    <div class="row">
        <p>vous pouvez aussi si vous le désirez préciser l'année de création de votre oeuvre</p>
    </div>
    <div class="input-field col s6 offset-s3 m4 offset-m4 ">
        <input name="date" id="date" type="text" class="validate" value="<?= isset($date) ? $date : '' ?>" />
        <label for="date">Date</label>
        <p class="text-danger"><?= isset($formError['date']) ? $formError['date'] : ''; ?></p>
    </div>

</div>
<div class="row">
    <button class="userchoicebutton btn waves-effect waves-light" type="submit" name="submit">Envoyer</button>
</div>
</form>

</div>