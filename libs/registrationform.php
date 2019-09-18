<?php
    if( isset($postdata['DoSignup']) )
        {
            $errors=array();
            if( $postdata['']=='' )
                {
                    $errors[]='';
                }
                if( $postdata['']=='' )
                {
                    $errors[]='';
               }

        }
?>

<form action="registration.php">
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