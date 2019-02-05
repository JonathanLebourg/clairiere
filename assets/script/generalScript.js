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
    $('[name="chekbox"]').change(function () {
        if ($(this).is(':checked')) {
            // Do something...
            $('.card-action a').removeClass("disabled")
        } else
            $('.card-action a').addClass("disabled")
    })
    $('.tabs').tabs();
//    
//    var tables = $('.datatable').DataTable();
// 
//tables.page( 'next' ).draw( false );
//    $('#datatable').DataTable();
//    $('#datatable2').DataTable();
$("table[id^='datatable']").DataTable();

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
