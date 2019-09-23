<?php
    require('libs/db.php');
    require('libs/functions.php');  
    $errors=array();
    if( trim($_POST['login'])=='' )
        {
            $errors[]='Введите, пожалуйста, логин!';
        }
    if( trim($_POST['email'])=='' )
        {
            $errors[]='Введите, пожалуйста, адрес электронной почты!';
        }
    if( $_POST['password']=='' )
        {
            $errors[]='Введите, пожалуйста, пароль!';
        }
    if( $_POST['password']!=$_POST['password2'] )
        {
            $errors[]='Пароли не совпадают!';
        }
    if( R::count('users', "login = ?", array($_POST['login']))>0 )
        {
            $errors[]='Логин уже занят!';
        }
    if( R::count('users', "email = ?", array($_POST['email'])) >0 )
        {
            $errors[]='На этот адрес электронной почты уже регистрировали аккаунт!';
        }
    if( empty($errors) )
        {
            $user = R::dispense('users');
            $user->login = $_POST['login'];
            $user->email = $_POST['email'];
            $user->password = password_hash($postdata['password'], PASSWORD_DEFAULT);
            $user->level = R::load('level', 1);
            R::store($user);
            sendappmessage('Регистрация', 'success', "успешно!");
            header('Location: index.php');
            exit();  
        }
    else
        {
            sendappmessage('Регистрация', 'danger', array_shift($errors));
            header('Location: index.php?reg=1'); 
            exit();  
        }
?>