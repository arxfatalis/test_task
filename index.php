<?php
    include_once 'db.php';

    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = 1;
    }

    $publication_on_page = 9;
    $from = ($page - 1) * $publication_on_page;

    $data = $_POST;

    $sql = "SELECT * FROM publication";
    if(!empty($data)){
        $filters = [];
        $bindings = [];
        foreach ($data as $key => $value) {
            $bindings[] = $value;
            $filters[] = "$key = ?";
        }
        $sql .= ' WHERE ' . implode(' AND ', $filters) . " ORDER BY `id` DESC LIMIT " . $from . ", " . $publication_on_page;
        $publications = R::getAll($sql, $bindings);
        exit(json_encode($publications));
    }else{
        $publications = R::findAll('publication', "ORDER BY `id` DESC LIMIT ?, ?", array($from, $publication_on_page)); 
    }
    


?>

<!doctype html>
<html lang="en">
<head>
    <?php include 'partials/head.php' ?>
</head>
<body>
    <?php include 'partials/header.php' ?>

    <main>
        <aside style="padding: 40px 0; padding-left:2%;" class="container-fluid">
            <div class="row search_div">
                <div class="col-md-2"><label for="">Область</label></div>
                <div class="col-md-2"><label for="">Город</label></div>
                <div class="col-md-2"><label for="">Марка</label></div>
                <div class="col-md-1"><label for="">Модель</label></div>
                <div class="col-md-2"><label for="">Объем двигателя(Л)</label></div>
                <div class="col-md-1"><label for="">Пробег</label></div>
                <div class="col-md-1"><label for="">Количество владельцев</label></div>
            </div>
            <form class="form-horizontal search_form">
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <select class="form-control" name="region">
                            <option value="none">Выберите область</option>
                            <option value="region1">Область№1</option>
                            <option value="region2">Область№2</option>
                            <option value="region3">Область№3</option>
                            <option value="region4">Область№4</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <select class="form-control" name="sity">
                            <option value="none" hidden="">Выберите город</option>
                            <option value="sity1">Город№1</option>
                            <option value="sity2">Город№2</option>
                            <option value="sity3">Город№3</option>
                            <option value="sity4">Город№4</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <select class="form-control" name="make">
                            <option value="none" hidden="">Выберите марку</option>
                            <option value="make1">Марка№1</option>
                            <option value="make2">Марка№2</option>
                            <option value="make3">Марка№3</option>
                            <option value="make4">Марка№4</option>
                        </select>
                    </div>
                    <div class="form-group col-md-1">
                        <select class="form-control" name="model">
                            <option value="none" hidden="">Выберите модель</option>
                            <option value="model1">Модель№1</option>
                            <option value="model2">Модель№2</option>
                            <option value="model3">Модель№3</option>
                            <option value="model4">Модель№4</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <input class="form-control" type="number" name="volume" min="0" step="any" placeholder="Введите объем двигателя">
                    </div>
                    <div class="form-group col-md-1">
                        <input class="form-control" type="number" name="mileage" min="0" placeholder="Введите пробег автомобиля">
                    </div>
                    <div class="form-group col-md-1">
                        <input class="form-control" type="number" name="numOfOwners" min="0" placeholder="Введите количество хозяев">
                    </div>
                    <div style="margin-top: 9px" class="col-sm-1">
                        <button type="submit" class="search-btn btn btn-warning">Найти</button>
                    </div>
                </div>
            </form>
        </aside>
        <section class="text-center mb-4">
            <div class="row wow fadeIn" id="publ">
                <?php
                    foreach ($publications as $publication){
                ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card">


                            <div class="view overlay">
                                <img style="height: 200px;" src="<?php echo $publication['photo']; ?>" alt="img">
                            </div>

                            <div class="card-body text-center">
                                <a class="text-dark" href="">
                                    <h5 class="font-weight-bold"><?php echo $publication['make']; ?>  <?php echo $publication['model']; ?></h5>
                                </a>
                                <h5>
                                    <strong>
                                        <a class="text-secondary" href=""><span class="badge badge-pill text-danger">Number of owners:</span><?php echo $publication['numOfOwners']; ?></a>
                                    </strong>
                                </h5>
                                <h5>
                                    <strong>
                                        <a class="text-secondary" href=""><?php echo $publication['volume']; ?>(Л)   <?php echo $publication['mileage']; ?>(км)</a>
                                    </strong>
                                </h5>
                                <div class="p-3 mb-2 bg-warning text-dark">
                                    <h3 class="font-weight-bold">
                                        <strong><?php echo $publication['price']; ?>($)</strong>
                                    </h4>
                                </div>
                            </div>
                            

                        </div>
                    </div>
                <?php
                }
                ?>




            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php
                    $count_publications = R::count("publications");
                    $pages_count = ceil($count_publications / $publication_on_page);
                    ?>

                    <?php if($page > 1): ?>
                        <li class="page-item"><a class="page-link" href="?page=<?php echo ($page-1);?>">Previous</a></li>
                    <?php endif; ?>

                    <?php
                    for($i = 1;$i <= $pages_count; $i++){
                        if($page = $i){
                            $status = ' active';
                        }else{
                            $status = '';
                        }
                    ?>
                        <li class="page-item"><a class="page-link <?php echo $status?>" href="?page=<?php echo $i;?>"><?php echo $i;?></a></li>
                    <?php
                    }
                    ?>
                    <?php if($page < $pages_count): ?>
                        <li class="page-item"><a class="page-link" href="<?php echo ($page+1);?>">Next</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
            </div>
        </section>
    </main>

    <?php include 'partials/footer.php' ?>
</body>
</html>