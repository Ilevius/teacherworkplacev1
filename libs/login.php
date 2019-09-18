<?php





if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login); }  }           //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} } //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
if (empty($login) or empty($password)) {echo '<script>location.replace("index.php?login=false");</script>'; exit;} //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт

                                                       //
                                                    //если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали,
                                                    //
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $login = trim($login);
    $password = trim($password);
                                                    //
                                                    //мало ли что люди могут ввести
                                                    //

    $dblocation = "localhost";
    $dbname = "z859392b_dist";
    $dbuser = "z859392b_dist";
    $dbpasswd = "TheriON9";
    $dbcnx = @mysql_connect($dblocation,$dbuser,$dbpasswd);
    if (!$dbcnx) 
        {
            exit();
        }
    if (!@mysql_select_db($dbname, $dbcnx)) 
        {
            exit();
        }

 
    $result = mysql_query("SELECT * FROM s2z WHERE login='$login'"); //извлекаем из базы все данные о пользователе с введенным логином
    $myrow = mysql_fetch_array($result);
    if (empty($myrow['login']))
        {
    //если пользователя с введенным логином не существует
            
            echo '<script>location.replace("index.php?login=false");</script>'; exit;
            exit();
        }
    else 
        {
                                                    //если существует, то сверяем пароли
            if ($myrow['password']==$password) 
                {
    //если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
                    $_GET['refresh']='let'; 
                    $_SESSION['id']=$myrow['id'];
                    $_SESSION['fio']=$myrow['fio'];
                    $_SESSION['login']=$myrow['login'];
                    $_SESSION['password']=$myrow['password'];
                    $_SESSION['rank']=$myrow['rank'];
                    echo '<script>location.replace("index.php");</script>'; exit;
    //эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
                }
            else 
                {
    //если пароли не сошлись
            
            echo '<script>location.replace("index.php?login=false");</script>'; exit;
            exit();
                }
        }
    ?>