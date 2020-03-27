<?php
    require_once 'db.php';

    if(!$_SESSION['logged_user']) {
        header('Location: signin.php');
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
        <form>
            <div class="form-group row">
                <div class="col-md-4"></div>
                <label style="padding-top: 1%" class="col-sm-1 col-form-label">Область</label>
                <div class="form-group col-md-2">
                    <select class="form-control" name="region">
                            <option value="none">Выберите область</option>
                            <option value="region1">Область№1</option>
                            <option value="region2">Область№2</option>
                            <option value="region3">Область№3</option>
                            <option value="region4">Область№4</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-4"></div>
                <label style="padding-top: 1%" class="col-sm-1 col-form-label">Город</label>
                <div class="form-group col-md-2">
                    <select class="form-control" name="sity">
                        <option value="none" hidden="">Выберите город</option>
                        <option value="sity1">Город№1</option>
                        <option value="sity2">Город№2</option>
                        <option value="sity3">Город№3</option>
                        <option value="sity4">Город№4</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-4"></div>
                <label style="padding-top: 1%" class="col-sm-1 col-form-label">Марка</label>
                <div class="form-group col-md-2">
                    <select class="form-control" name="make">
                        <option value="none" hidden="">Выберите марку</option>
                        <option value="make1">Марка№1</option>
                        <option value="make2">Марка№2</option>
                        <option value="make3">Марка№3</option>
                        <option value="make4">Марка№4</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-4"></div>
                <label style="padding-top: 1%" class="col-sm-1 col-form-label">Модель</label>
                <div class="form-group col-md-2">
                    <select class="form-control" name="model">
                        <option value="none" hidden="">Выберите модель</option>
                        <option value="model1">Модель№1</option>
                        <option value="model2">Модель№2</option>
                        <option value="model3">Модель№3</option>
                        <option value="model4">Модель№4</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-4"></div>
                <label class="col-md-1 col-form-label">Объем двигателя(Л)</label>
                <div class="form-group col-md-2">
                    <input class="form-control" type="number" name="volume" min="0" step="any" placeholder="Введите объем двигателя">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-4"></div>
                <label class="col-md-1 col-form-label">Пробег</label>
                <div class="form-group col-md-2">
                    <input class="form-control" type="number" name="mileage" min="0" placeholder="Введите пробег автомобиля">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-4"></div>
                <label class="col-md-1 col-form-label">Количество хозяев</label>
                <div class="form-group col-md-2">
                    <input class="form-control" type="number" name="numOfOwners" min="0" placeholder="Введите количество хозяев">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-4"></div>
                <label class="col-md-1 col-form-label">Загрузите фото</label>
                <div class="col-md-2" style="margin-left:1%">
                    <input name="photo" type="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
            </div>

            <div class="form-group row">
                <div class="col-md-4"></div>
                <label class="col-md-1 col-form-label">Укажите цену($)</label>
                <div class="form-group col-md-2">
                    <input class="form-control" type="number" name="price" min="0" placeholder="Введите цену">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-4"></div>
                <div class="col-md-2" style="margin-left: 7%">
                    <button type="submit" class="btn btn-warning sell-btn">Выставить объявление</button>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4"></div>
                <div class="col-md-3" style="padding-left: 2%">
                    <p class="msg none"></p>
                </div>
            </div>
        </form>
    </div>

    <?php include 'partials/footer.php' ?>
</body>
</html>