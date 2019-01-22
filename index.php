<?php ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>La clairière</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="assets/generalStyle.css" /> 
    </head>
    <body>
        <main>
        <div class="container-fluid">
            <?php
            include 'views/navbar.php';
            ?>
        </div>

        <div class="container-fluid">
<?php
            if (!isset($_GET['page'])) {
                include('views/accueil.php');
            } else {
                switch ($_GET['page']) {
                    case 'accueil':
                        include('views/accueil.php');
                        break;
//                    case 'accueil2':
//                        include('views/accueil2.php');
//                        break;
                    case 'whoIam':
                        include('views/whoIam.php');
                        break;
//                    case 'estimate':
//                        include('views/estimate.php');
//                        break;
                    case 'contact':
                        include('views/contact.php');
                        break;
                    case 'inscription':
                        include('views/userChoice.php');
                        break;
//                    case 'welcome':
//                        include('views/welcome.php');
//                        break;
                    case 'artistForm':
                        include('views/artistForm.php');
                        break;
                    case 'clientForm':
                        include('views/clientForm.php');
                        break;     
//                    case 'worksForm':
//                        include('views/worksForm.php');
//                        break;
//                    case 'estimateForm':
//                        include('views/estimateForm.php');
//                        break;
                    case 'admin':
                        include('views/myprofileAdmin.php');
                        break;
                    case 'myprofileArtist':
                        include('views/myprofileArtist.php');
                        break;
                    case 'listAll':
                        include('views/listAll.php');
                        break;
                    case 'myprofileClient':
                        include('views/myprofileClient.php');
                        break;
                    case 'mentions':
                        include('views/mentions.php');
                        break;
                    default :
                        include('views/accueil.php');
                        break;
                }
            }
            ?>
        </div>
           
        
        <div class="container-fluid">
            <?php
            include 'views/footer.php';
            ?>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script src="assets/script/generalScript.js"></script>
        
        <script src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

        <script src="assets/script/tableScriptUsers.js"></script>
         </main>
    </body>
</html>
