$(document).ready(function () {
//**-------dropdown-------**
    $('.dropdown-trigger').dropdown();
    $('.materialboxed').materialbox();
//**-----------modal connexion----------**
    $('.modal').modal();
    //**-----navbar responsive----**
    $('.sidenav').sidenav({edge: 'right'});
    //**----select en materialize-----**
    $(document).ready(function () {
        $('select').formSelect();
    });
//**-----fction jquery pour activer les boutons ds userChoice quand on checked les conditions générales------**
    $('[name="checkbox"]').change(function () {
        if ($(this).is(':checked')) {
            // Do something...
            $('.card-action a').removeClass("disabled")
        } else
            $('.card-action a').addClass("disabled")
    })

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
