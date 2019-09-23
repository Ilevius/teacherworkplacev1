<?php
$adminmenu='
<ul class="navbar-nav mr-auto">
<li class="nav-item '.$menu0.'">
    <a class="nav-link" href="index.php?reg=0">Главная <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item '.$menu1.'">
   <a class="nav-link" href="index.php?reg=1">Пользователи</a>
</li>
</ul>
'; 
$guestmenu='
<ul class="navbar-nav mr-auto">
<li class="nav-item '.$menu1.'">
    <a class="nav-link" href="index.php?reg=0">Главная <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item '.$menu2.'">
   <a class="nav-link" href="index.php?reg=1">Регистрация</a>
</li>
</ul>
';


$subscribermenu='
<ul class="navbar-nav mr-auto">
<li class="nav-item '.$menu1.'">
    <a class="nav-link" href="index.php?reg=0">Главная <span class="sr-only">(current)</span></a>
</li>
</ul>
';




$loginform='
<form action="login.php" method="post" class="form-inline my-2 my-lg-0">
<input name="login" class="form-control mr-sm-2" type="text" placeholder="логин" aria-label="Search">
<input name="password" class="form-control mr-sm-2" type="password" placeholder="пароль" aria-label="Search">
<button name="SignIn" class="btn btn-primary my-2 my-sm-0" type="submit" >Войти</button>
</form>
';

$userbox='
<form action="logout.php" method="post" class="form-inline">
<div class="form-check mb-2 mr-sm-2">
    <label class="form-check-label" for="inlineFormCheck">
        '.$_SESSION['user']['login'].'
    </label>
</div>
<div class="form-check mb-2 mr-sm-2">
    <small id="passwordHelpInline" class="text-muted">
        - '.$_SESSION['user']['rolename'].'
    </small>
</div>
<button type="submit" name="LogOut" class="btn btn-primary mb-2">Выйти</button>
</form>'; 
switch($_SESSION['user']['role'])
{
    case 1:
        echo $adminmenu;
        echo $userbox;
        break;
    case 7:
        echo $subscribermenu;
        echo $userbox;
        break;
    default:
        echo $guestmenu;
        echo $loginform;
        break;


}

?>