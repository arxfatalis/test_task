<?php
    require_once 'db.php';

    if ($_SESSION['logged_user']) {
        header('Location: index.php');
    }
?>

<!doctype html>
<html lang="en">
<head>
    <?php include 'partials/head.php' ?>
</head>
<body>
    <?php include 'partials/header.php' ?>


    <div class="form">
        <form style="padding-top:15%">
            <div class="form-group row">
                <div class="col-lg-4"></div>
                <label class="col-sm-1 col-form-label">Логин</label>
                <div class="col-lg">
                    <input type="text" name="login" placeholder="Введите свой логин">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-4"></div>
                <label class="col-sm-1 col-form-label">Пароль</label>
                <div class="col-lg">
                    <input type="password" name="password" placeholder="Введите пароль">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-4"></div>
                <button class="col-lg-3 login-btn btn btn-primary" type="submit">Войти</button>
            </div>
            <div class="form-group row">
                <div class="col-lg-4"></div>
                <div class="col-lg-3" style="padding-left: 3%">
                    <p>
                    У вас нет аккаунта? - <a href="signup.php">зарегистрируйтесь</a>!
                    </p>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-4"></div>
                <div class="col-lg-3" style="padding-left: 2%">
                    <p class="msg none"></p>
                </div>
            </div>
        </form>
    </div>

    <?php include 'partials/footer.php' ?>
</body>
</html>