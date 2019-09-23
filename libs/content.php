<?php
switch($_SESSION['user']['role'])                                               
    {
        case 1:                     // Адмистраторские приложения и их маршрутизация
            switch($_GET['reg'])
            {
                case 1:
                    include('libs/apps/users.php');
                    break;
                default:
                    include('libs/apps/startpage.php');
                    break;
            }
            break;

        case 4:                 // Учительские приложения и их маршрутизация
            switch($_GET['reg'])
            {
                default:
                    include('libs/apps/startpage.php');
                    break;   
            }
            break;
        case 5:                 // Ученические приложения и их маршрутизация
            switch($_GET['reg'])
            {
                default:
                    include('libs/apps/startpage.php');
                    break;   
            }
            break;
        
        default:
            switch($_GET['reg'])
            {
                case 1:
                    include('libs/apps/registrationform.php');
                    break;
                default:
                    include('libs/apps/startpage.php');
                    break;   
            }
            break;

    }
?>