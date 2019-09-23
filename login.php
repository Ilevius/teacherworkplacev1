<?php
require('libs/db.php');
require('libs/functions.php'); 
$errors=array();
if( trim($_POST['login'])=='' )
    {
        $errors[]='Введите, пожалуйста, логин!';
    }
if( $_POST['password']=='' )
    {
        $errors[]='Введите, пожалуйста, пароль!';
    }
$user = R::findOne('users', 'login=?', array($_POST['login']) );
if( $user )                                                                     //there is a user
    {
        if( password_verify($postdata['password'], $user->password) )           // password is right
            {
                $loggeduser=array();
                $loggeduser['login'] = $user->login;
                $loggeduser['role'] = $user->level_id;
                $loggeduser['rolename'] = $user->level->name;
                session_start();
                $_SESSION['user'] = $loggeduser;
                header('Location: index.php'); 
                exit();
            }
        else                                                                    // password is wrong 
            {
                $errors[]='Пароль не подходит к указанному логину!';
            }
    }
else                                                                             //there's no user
    {
        $errors[] = 'Пользователя с таким логином не найдено!';   
    }
$errors=array_shift($errors);
sendappmessage('Авторизация', 'danger', $errors);
header('Location: index.php');
exit();        
?>

