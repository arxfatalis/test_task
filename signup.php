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
        <form style="padding-top:10%">
            <div class="form-group row">
                <div class="col-lg-4"></div>
                <label class="col-sm-1 col-form-label">Логин</label>
                <div class="col-lg">
                    <input type="text" name="login" placeholder="Введите свой логин">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-4"></div>
                <label class="col-sm-1 col-form-label">Email</label>
                <div class="col-lg">
                    <input type="email" name="email" placeholder="name@example.com">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-4"></div>
                <label class="col-sm-1 col-form-label">Изображение профиля</label>
                <div style="margin-top: 1%; margin-left:1%" class="col-lg-2">
                    <input id="customFile" class="custom-file-input" type="file" name="avatar">
                    <label class="custom-file-label" for="customFile">Choose file</label>
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
                <label class="col-sm-1 col-form-label">Подтверждение пароля</label>
                <div class="col-lg">
                    <input type="password" name="password_confirm" placeholder="Подтвердите пароль">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-lg-4"></div>
                <button type="submit" class="col-lg-3 register-btn btn btn-primary">Зарегистрироваться</button>
            </div>
            <div class="form-group row">
                <div class="col-lg-4"></div>
                <div class="col-lg-3" style="padding-left: 3%">
                    <p>
                        У вас уже есть аккаунт? - <a href="signin.php">авторизируйтесь</a>!
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