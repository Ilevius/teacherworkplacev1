<?php
session_start();                                        //поднимаем сессию
require('libs/functions.php');
$currentuser=$_SESSION['user'];
$getdata=$_GET;
$postdata=$_POST;
createlevels();
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
        <?php showappmessage();                                      // Отображение ошибок и прочих сообщений при авторизации или регистрации?>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">TWP</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <?php
                        require('libs/regswitch.php');      //      Выделяем активный пункт меню
                        require('libs/navbarcontent.php'); //      Вывод пунктов меню доступных данному пользователю, его уголка  
                    ?>
       
            </div>
        </nav>                                                                  
    <?php require('libs/content.php');                      // Вывод основного контента страницы ?>                    
    </body>
</html>