<?php 
    require_once '../db.php';
    $data = $_POST;

    $error_fields = [];

    if($data['region'] === 'none'){
        $error_fields[] = 'region';
    }

    if($data['sity'] === 'none'){
        $error_fields[] = 'sity';
    }

    if($data['make'] === 'none'){
        $error_fields[] = 'make';
    }

    if($data['model'] === 'none'){
        $error_fields[] = 'model';
    }

    if($data['volume'] === '0' or $data['volume'] === ''){
        $error_fields[] = 'volume';
    }

    if($data['mileage'] === '0' or $data['mileage'] === ''){
        $error_fields[] = 'mileage';
    }

    if($data['numOfOwners'] === '0' or $data['numOfOwners'] === ''){
        $error_fields[] = 'numOfOwners';
    }

    if($data['price'] === '0' or $data['price'] === ''){
        $error_fields[] = 'price';
    }


    if(!empty($error_fields)){
        $response = [
            "status" => false,
            "type" => 1,
            "message" => "Проверьте правильность полей",
            "fields" => $error_fields
        ];
        echo json_encode($response);
        die();
    }


    $path = 'data/fs/' . time() . $_FILES['photo']['name'];
    if (!move_uploaded_file($_FILES['photo']['tmp_name'], '../' . $path)) {
        $response = [
            "status" => false,
            "type" => 2,
            "message" => "Ошибка при загрузке фото",
        ];
        echo json_encode($response);
        die();
    }

    $user = R::load("user", $_SESSION['logged_user']->id);
    if($user->withCondition("`status` = 1")->countOwn("publication") >= 3){
        $response = [
            "status" => false,
            "type" => 1,
            "message" => "У вас активно 3 или более публикаций. Удалите или закройте одну из них, что бы отправить новую",
            "fields" => $error_fields
        ];
        echo json_encode($response);
        die();
    }

    $publication = R::dispense('publication');
    $publication->region = $data['region'];
    $publication->sity = $data['sity'];
    $publication->make = $data['make'];
    $publication->model = $data['model'];
    $publication->volume = $data['volume'];
    $publication->mileage = $data['mileage'];
    $publication->numOfOwners = $data['numOfOwners'];
    $publication->price = $data['price'];
    $publication->photo = $path;
    $publication->status = true;    

    $user->ownPublicationList[] = $publication;

    R::store($user);

    $response = [
        "status" => true,
        "message" => "Публикация прошла успешно!",
    ];
    echo json_encode($response);
?>