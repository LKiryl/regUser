<?php

    session_start();
$jsonArray = [];

//Если файл существует - получаем его содержимое
if (file_exists('users.json')){
    $json = file_get_contents('users.json');
    $jsonArray = json_decode($json, true);
}


    $login = $_POST['login'];
    $pass = $_POST['pass'];
    $hash = "asrAs1231rsa21Rs";

    $error = [];

    if($login === '') {
        $error[] = 'login';

    }

    if($pass === '') {
       $error[] = 'pass';
    }

    if(!empty($error)) {
        $response = [
            "status" => false,
            "type" => 1,
            "message" => "Проверьте правильность полей",
            "fields" => $error
        ];

        echo json_encode($response);

        die();
    }

    $pass = md5($_POST['pass'] . $hash);

function check_user($js,$log, $pass)
{
    foreach ($js as $check_user) {
        if ($check_user['login'] == $log
        && $check_user['pass'] == $pass) {

                    $_SESSION['user'] = $log;

                    $response = [
                        "status" => true
                    ];

                    echo json_encode($response);
                 
                } else {

            $response = [
                "status" => false,
                "message" => 'Неверный логин или пароль'
            ];

            echo json_encode($response);


        }
        break;
     }
}
check_user($jsonArray, $login, $pass);
//    $check_user = mysqli_query($connect, "SELECT * FROM 'users' WHERE 'login' = '$login' AND 'pass' = '$pass'");
//    if(mysqli_num_rows($check_user) > 0) {
//        $user = mysqli_fetch_assoc($check_user);
//
//
//        $_SESSION['user'] = [
//            "id" => $user['id'],
//            "name" => $user['name']
//        ];
//
//        $response = [
//            "status" => true
//        ];
//
//        echo json_encode($response);
//
//    } else {
//
//        $response = [
//            "status" => false,
//            "message" => 'Неверный логин или пароль'
//        ];
//
//        echo json_encode($response);
//    }
