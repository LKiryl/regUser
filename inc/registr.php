<?php

session_start();
$jsonArray = [];

//Если файл существует - получаем его содержимое
if (file_exists('users.json')){
    $json = file_get_contents('users.json');
    $jsonArray = json_decode($json, true);
}

function clear_data($val){
    $val = stripslashes($val);
    $val = strip_tags($val);
    $val = htmlspecialchars($val);
    return $val;
}
$login = clear_data($_POST['login']);
$pass = clear_data($_POST['pass']);
$confirm_pass = clear_data($_POST['confirm_pass']);
$email = clear_data($_POST['email']);
$name = clear_data($_POST['name']);



$error = [];
$error_fields = [];
$flag = 0;

//проверка на валидность
if (strlen($login) < 6 || empty($login)) {
    $error_fields[] = 'login';
    $error['login'] = "Логин должен содержать минимум 6 символов";
    $flag = 1;

    $response = [
        "status" => false,
        "type" => 2,
        "message" => $error['login'],
        "fields" => $error_fields
    ];

    echo json_encode($response);

    die();
}
for($i=0;$i<strlen($login);$i++) {
    if($login[$i]== " ") {
        $error_fields[] = 'login';
        $error['login'] = "Логин не должен содержать пробелы";
        $flag = 1;

        $response = [
            "status" => false,
            "type" => 2,
            "message" => $error['login'],
            "fields" => $error_fields
        ];

        echo json_encode($response);

        die();
    }

}

function check_login($js,$log, $e)
{
    foreach ($js as $check_login) {
        if ($check_login['login'] == $log) {
            $error_fields[] = 'login';
            $error['login'] = "Такой логин уже существует";
            $response = [
                "status" => false,
                "type" => 2,
                "message" => $error['login'],
                "fields" => $error_fields
            ];

            echo json_encode($response);
            die();
        }
        foreach ($js as $check_email)
            if ($check_email['email'] == $e) {
                $error_fields[] = 'email';
                $error['email'] = "Эта почта уже заргестрирована";
                $response = [
                    "status" => false,
                    "type" => 5,
                    "message" => $error['email'],
                    "fields" => $error_fields
                ];

                echo json_encode($response);
                die();
            }

    }
}


check_login($jsonArray,$login,$email);




if (strlen($pass) < 6 || empty($pass)){
    $error_fields[] = 'pass';
    $error['pass'] = "Пароль должен содержать минимум 6 символов";
    $flag = 1;
    $response = [
        "status" => false,
        "type" => 3,
        "message" => $error['pass'],
        "fields" => $error_fields
    ];

    echo json_encode($response);

    die();

}
else if (! preg_match('~\d~', $pass)){
    $error_fields[] = 'pass';
    $error['pass'] = "Пароль должен содержать хотя бы 1 цифру";
    $flag = 1;
    $response = [
        "status" => false,
        "type" => 3,
        "message" => $error['pass'],
        "fields" => $error_fields
    ];

    echo json_encode($response);

    die();
}
else if (! preg_match('~[a-zа-яё]~', $pass)){
    $error_fields[] = 'pass';
    $error['pass'] = "Пароль должен содержать хотя бы 1 букву";
    $flag = 1;
    $response = [
        "status" => false,
        "type" => 3,
        "message" => $error['pass'],
        "fields" => $error_fields
    ];

    echo json_encode($response);

    die();
}else if(preg_match('~[!@#$%^&*]~', $pass)){
    $error_fields[] = 'pass';
    $error['pass'] = "Пароль должен содержать только буквы и цифры";
    $flag = 1;
    $response = [
        "status" => false,
        "type" => 3,
        "message" => $error['pass'],
        "fields" => $error_fields
    ];

    echo json_encode($response);

    die();
}
for($i=0;$i<strlen($pass);$i++) {
    if($pass[$i]== " ") {
        $error_fields[] = 'pass';
        $error['pass'] = "Пароль не должен содержать пробелы";
        $flag = 1;

        $response = [
            "status" => false,
            "type" => 3,
            "message" => $error['pass'],
            "fields" => $error_fields
        ];

        echo json_encode($response);

        die();
    }

}


if ($pass !== $confirm_pass){
    $error_fields[] = 'confirm_pass';
    $error['confirm_pass'] = "Символы не соответствуют паролю";
    $flag = 1;
    $response = [
        "status" => false,
        "type" => 4,
        "message" => $error['confirm_pass'],
        "fields" => $error_fields
    ];

    echo json_encode($response);

    die();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $error_fields[] = 'email';
    $error['email'] = "Формат Email не верный!";
    $flag = 1;
    $response = [
        "status" => false,
        "type" => 5,
        "message" => $error['email'],
        "fields" => $error_fields
    ];

    echo json_encode($response);

    die();
}


if (strlen($name) < 2  || empty($name)){
    $error_fields[] = 'name';
    $error['name'] = "Имя должно быть не меньше 2 символов";
    $flag = 1;
    $response = [
        "status" => false,
        "type" => 6,
        "message" => $error['name'],
        "fields" => $error_fields
    ];

    echo json_encode($response);

    die();
}else if(strlen($name) > 2){
    $error_fields[] = 'name';
    $error['name'] = "Имя должно быть не больше 2 символов";
    $flag = 1;
    $response = [
        "status" => false,
        "type" => 6,
        "message" => $error['name'],
        "fields" => $error_fields
    ];

    echo json_encode($response);

    die();

} else if (! preg_match('~[a-z]~', $name)){
    $error_fields[] = 'name';
    $error['name'] = "Введите корректное имя";
    $flag = 1;
    $response = [
        "status" => false,
        "type" => 6,
        "message" => $error['name'],
        "fields" => $error_fields
    ];

    echo json_encode($response);

    die();}



$hash = "asrAs1231rsa21Rs";
$pass = md5($pass . $hash);
$id = rand(1000000, 2000000);

$user = [
    'id' => $id,
    'login' => $login,
    'pass' => $pass,
    'email' => $email,
    'name' => $name,
];

if($flag === 0){

    $jsonArray[] = $user;
    file_put_contents('users.json', json_encode($jsonArray, JSON_PRETTY_PRINT));

}



$response = [
    "status" => true,
    "message" => "Регистрация прошла успешно!",
];
echo json_encode($response);

