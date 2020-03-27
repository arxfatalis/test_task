<?php 
    require_once '../db.php';
    $data = $_POST;

    if(R::count('users', 'login = ?', array($data['login'])) > 0){
        $response = [
            "status" => false,
            "type" => 1,
            "message" => "Пользователь с таким логином уже существует",
            "fields" => ['login']
        ];
        echo json_encode($response);
        die();
    }

    if(R::count('users', 'email = ?', array($data['email'])) > 0){
        $response = [
            "status" => false,
            "type" => 1,
            "message" => "Пользователь с таким email уже существует",
            "fields" => ['email']
        ];
        echo json_encode($response);
        die();
    }

    $error_fields = [];

    if($data['login'] === ''){
        $error_fields[] = 'login';
    }

    if($data['password'] === ''){
        $error_fields[] = 'password';
    }

    if($data['password_confirm'] === ''){
        $error_fields[] = 'password_confirm';
    }

    if($data['email'] === '' || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
        $error_fields[] = 'email';
    }


    if(!$_FILES['avatar']){
        $error_fields[] = 'avatar';
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

    if($password != $password_confirm){
        $response = [
            "status" => false,
            "message" => "Пароли не совпадают",
        ];
        echo json_encode($response);
    }else{
        $path = 'data/fs/' . time() . $_FILES['avatar']['name'];
        if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
            $response = [
                "status" => false,
                "type" => 2,
                "message" => "Ошибка при загрузке аватарки",
            ];
            echo json_encode($response);
            die();
        }

        $user = R::dispense('user');
        $user->login = $data['login'];
        $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
        $user->avatat = $path;
        $user->email = $data['email'];
        R::store($user);

        $response = [
            "status" => true,
            "message" => "Регистрация прошла успешно!",
        ];
        echo json_encode($response);
    }
?>