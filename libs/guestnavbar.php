    <!-- НАВБАР гостя -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">TWP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?reg=0">Главная <span class="sr-only">(current)</span></a>
                    <a class="nav-link" href="registration.php">Регистрация на сайте <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <form action="index.php?login=LoggingIn" method="post" class="form-inline my-2 my-lg-0">
                <input name="login" class="form-control mr-sm-2" type="text" placeholder="логин" aria-label="Search">
                <input name="password" class="form-control mr-sm-2" type="password" placeholder="пароль" aria-label="Search">
                <button class="btn btn-primary my-2 my-sm-0" type="submit" >Войти</button>
            </form>
        </div>
    </nav>                                                                            <!--        ТЕЛО СТРАНИЧКИ      -->              
