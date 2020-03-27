<header>
    <nav class="navbar navbar-expand-md navbar-light bg-light stiky-top">
        <div class="container-fluid">
            <div>
                <a href="/" class="navbar-brand"><span>LOGO</span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav" style="padding-left: 100px">
                    <li class="nav-item active"><a href="" class="nav-link">Легковые</a></li>
                    <li class="nav-item"><a href="" class="nav-link">Мото</a></li>
                    <li class="nav-item"><a href="" class="nav-link">Коммерческие</a></li>
                    <li class="nav-item"><a href="" class="nav-link">Запчасти</a></li>
                    <li class="nav-item"><a href="" class="nav-link">Автосалоны</a></li>
                    <li class="nav-item"><a href="" class="nav-link">Каталог</a></li>
                    <li class="nav-item"><a href="" class="nav-link">Сервисы</a></li>
                    <li class="nav-item" style="background-color: yellow"><a href="add.php" class="nav-link"><span>+Продать</span></a></li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <?php if($_SESSION['logged_user']): ?>
                        <li class="nav-item active"><a href="signout.php" class="nav-link">Выйти</a></li>
                    <?php else: ?>
                        <li class="nav-item active"><a href="signin.php" class="nav-link">Войти</a></li>
                        <li class="nav-item"><a href="signup.php" class="nav-link">Зарегистрироваться</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>