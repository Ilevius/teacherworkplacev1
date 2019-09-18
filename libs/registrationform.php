<?php
    if( isset($postdata['DoSignup']) )
        {
            $errors=array();
            if( trim($postdata['login'])=='' )
                {
                    $errors[]='Введите, пожалуйста, логин!';
                }
            if( trim($postdata['email'])=='' )
                {
                    $errors[]='Введите, пожалуйста, адрес электронной почты!';
                }
            if( $postdata['password']=='' )
                {
                    $errors[]='Введите, пожалуйста, пароль!';
                }
            if( $postdata['password']!=$postdata['password2'] )
                {
                    $errors[]='Пароли не совпадают!';
                }
            if( empty($errors) )
                {
                    alert('success', 'Регистрация прошла успешно!');
                }
            else
                {
                    alert('danger', array_shift($errors));   
                }

        }
?>

<form action="registration.php" method="POST">
    <p>
        <p><strong>Ваш логин</strong></p>
        <input type="text" name="login">
    </p>
    <p>
        <p><strong>Ваш e-mail</strong></p>
        <input type="email" name="email">
    </p>

    <p>
        <p><strong>Ваш пароль</strong></p>
        <input type="password" name="password">
    </p>

    <p>
        <p><strong>Введите пароль еще раз</strong></p>
        <input type="text" name="password2">
    </p>

    <p>
        <button type="submit" name="DoSignup">Зарегистрироваться</button>
    </p>

</form>