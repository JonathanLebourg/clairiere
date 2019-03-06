$(document).ready(function () {
//Les fonctions jQuery nécessaires pour les éléments MaterializeCSS
    //**-------dropdown pour la navbar-------**
    $('.dropdown-trigger').dropdown();
    //**-------materialbox pour grandir une image en un clic-------**
    $('.materialboxed').materialbox();
    //**-------modal-------**
    $('.modal').modal();
    //**-----sidenav pour la navbar qui se met sur la droite en responsive----**
    $('.sidenav').sidenav({edge: 'right'});
    //**----select-----**
    $(document).ready(function () {
        $('select').formSelect();
    });
//**-----Fonction les tableaux de la partie admin-----**   
    $('.tabs').tabs();
    $('#datatable').DataTable();
//**-----Fonction pour activer les boutons dans userChoice.php quand on checked les conditions générales------**
    $('[name="checkbox"]').change(function () {
        if ($(this).is(':checked')) {
//          enlève la classe disabled et rend le bouton cliquable
            $('.card-action a').removeClass("disabled")
        } else
//          sinon rajoute la classe disabled
            $('.card-action a').addClass("disabled")
    })
//  Lancement des toggle de chaque div au clic sur chaque bouton pour les formulaires de modification de profil
    $('[name="submitNickName"]').click(function () {
        $('.modifDivNickName').toggle(500);
    });
    $('[name="submitLastName"]').click(function () {
        $('.modifDivLastName').toggle(500);
    });
    $('[name="submitFirstName"]').click(function () {
        $('.modifDivFirstName').toggle(500);
    });
    $('[name="submitMail"]').click(function () {
        $('.modifDivMail').toggle(500);
    });
    $('[name="submitPassword"]').click(function () {
        $('.modifDivPassword').toggle(500);
    });
    $('[name="submitProfileImg"]').click(function () {
        $('.modifDivProfileImg').toggle(500);
    });
    $('[name="submitSpeciality"]').click(function () {
        $('.modifDivSpeciality').toggle(500);
    });
    $('[name="submitPresent"]').click(function () {
        $('.modifDivPresent').toggle(500);
    });
    $('[name="submitTitle"]').click(function () {
        $('.modifDivTitle').toggle(500);
    });
//  Fonction pour afficher l'aperçu des images dans les formulaires
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#output').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#fileToUpload").change(function () {
        readURL(this);
    });
});










//**-------carousel--------**
//$(document).ready(function () {
//    $(".owl-carousel").owlCarousel();
//});


//**-----function pour ramener les noms de ville dans l inmput ville du form artist-----**
//
//$(function townChoice()
//{
//    $("#town").click(function () {
//        ;
//    })
//});
