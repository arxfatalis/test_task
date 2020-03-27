<?php 

    require_once '../db.php';
    $data = $_POST;

    $error_fields = [];

    if ($data['login'] === '') {
        $error_fields[] = 'login';
    }

    if ($data['password'] === ''){
        $error_fields[] = 'password';
    }

    if (!empty($error_fields)) {
        $response = [
            "status" => false,
            "type" => 1,
            "message" => "Проверьте правильность полей",
            "fields" => $error_fields
        ];

        echo json_encode($response);
        die();
    }

    $user = R::findOne('user', 'login = ?', array($data['login']));
    if($user){
        if(password_verify($data['password'], $user->password)){
            $_SESSION['logged_user'] = $user;
            $response = [
                "status" => true
            ];
            echo json_encode($response);
        }else{
            $response = [
                "status" => false,
                "message" => 'Не верный логин или пароль'
            ];
        
            echo json_encode($response);
        }
    }
?>