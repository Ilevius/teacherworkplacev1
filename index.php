<?php
session_start();//поднимаем сессию
require('libs/db.php');
$session=$_SESSION;
$getdata=$_GET;
$postdata=$_POST;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TWP</title>
        
        <link rel="stylesheet" href="css/bootstrap.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src='js/bootstrap.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/MathJax.js?config=TeX-MML-AM_CHTML' async></script>

        <script type="text/javascript" src='js/tiamat.js'></script>
    </head>
    <body>
    <?php

        if( isset($session['UserRole']) )
            {

            }
        else
        
            {
                require('libs/startpage.php');   
            }
            
  /*          
            //СОБИРАЕМ ЮЗЕРУ ПАНЕЛЬ НАВИГАЦИИ переключаем режим просмотра СМОТРЯ КТО ОН
        
        if ($_SESSION['rank']=='')                                                    //если не авторизован
            {
                if($_GET['login']=='false'){include('stuff/false_parol.php');}        // если неверный ввод
                if($_GET['login']=='...'){include('stuff/login.php');}                // отправка логина и пароля на проверку
                include('stuff/navbar_host.php');                                    // НАВБАР ДЛЯ ГОСТЯ 
                include('main.php');
            }
        else                                                                          //если Авторизован
            {
                if($_GET['login']=='logout')
                    {
                        $_SESSION = array();
                        echo '<script>location.replace("index.php");</script>'; 
                        exit;
                    } // если выходим
                include('stuff/regswitch.php');                                        // прослушивам меню и переключаем режим работы
                switch($_SESSION['rank'])                                               // ВЫДАЧА КОНТЕНТА В ЗАВИСИМОСТИ ОТ ПРАВ ЮЗЕРА
                    {
                        case 0:
                            include('stuff/navbar_pupil.php');                        // навбар ученика
                            switch($_SESSION['reg'])
                                {
                                    case 0:
                                        include('main.php');
                                        break;
                                    case 1:
                                        include('stuff/test.php');
                                        break;
                                    case 2:
                                        include('stuff/browser.php');
                                        break;    
                                }
                            break;
                        case 1:
                            include('stuff/navbar_admin.php');                       // ADMINISTRATOR NAVBAR
                            switch($_SESSION['reg'])
                                {
                                    case 0:
                                        include('main.php');
                                        break;
                                    case 1:
                                        include('stuff/s2tselection.php');
                                        include('stuff/test.php');
                                        break;
                                    case 2:
                                        include('stuff/s2tselection.php');
                                        include('stuff/themeselection.php');
                                        include('stuff/browser.php');
                                        break;
                                    case 3:
                                        include('stuff/editor_text.php');
                                        break;
                                    case 4:
                                        include('stuff/editor_picture.php');
                                        break;
                                    case 5:
                                        include('stuff/editor_ins.php');
                                        break;
                                    case 6:
                                        include('stuff/editor_two.php');
                                        break;
                                }
                            break;
                    }
            }


            */
    ?>
    </body>
</html>