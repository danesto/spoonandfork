<?php
    require_once "config/connection.php";

    include "views/partials/head.php";
    include "views/partials/nav.php";

    if(isset($_GET['page'])){
        
        switch($_GET['page']){
            case 'pocetna':
               include "views/pages/pocetna.php";
               break;
            case 'restorani':
                include "views/pages/restorani.php";
                break;
            case 'login':
                include "views/pages/login.php";
                break;
            case 'logout':
                include "models/korisnici/logout.php";
                break;
            case 'admin':
                include "views/admin/admin.php";
                break;
            case 'restoraniadmin':
                include "views/admin/restoraniadmin.php";
                break;
             case 'register':
                include "views/pages/register.php";
                break;
            case 'userupdate':
                include "views/admin/userupdate.php";
                break;
            case 'oautoru':
                include "views/pages/oautoru.php";
                break;
            case '404':
                include "views/pages/404.php";
                break;
            case '503':
                include "views/pages/503.php";
                break;
            default: 
                include "views/pages/pocetna.php"; 
                break;
        }

    } else {
        include "views/pages/pocetna.php";
    }


    include "views/partials/footer.php";
?>

