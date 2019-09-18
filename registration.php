<?php
session_start();                                        //поднимаем сессию
require('libs/db.php');                                 // подключаемся к базе данных
require('libs/functions.php');
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

        if( isset($session['UserRole']) )                         // если пользователь авторизован
            {

            }
        else                                                     // если пользователь НЕ авторизован
            {
                require('libs/guestnavbar.php');                                                // выдаем гостевую панель навигации
                require('libs/registrationform.php');                                              // выдаем главную страницу
            }
            

    ?>
    </body>
</html>