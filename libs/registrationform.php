<?php
    if( isset($postdata['DoSignup']) )
        {
            $errors=array();
            if( $postdata['login']=='' )
                {
                    $errors[]='Введите, пожалуйста, логин!';
                }
            if( $postdata['email']=='Введите, пожалуйста, адрес электронной почты!' )
                {
                    $errors[]='';
                }
            if( $postdata['password']=='Введите, пожалуйста, пароль!' )
                {
                    $errors[]='';
                }
            if( $postdata['password']!=$postdata['password2'] )
                {
                    $errors[]='Пароли не совпадают!';
                }
            if( empty($errors) )
                {
                    // go registration
                }
            else
                {
                    alert('danger', array_shift($errors));   
                    echo '!!!!!';
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