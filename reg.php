<?php
    session_start();
    if($_SESSION['user']){
        header('Location: loggedin.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="icon" href="uploads/icon.ico">
    <link rel="stylesheet" href="assets/css/main.css">
    <style>
      body {  background: url(uploads/1.jpg);
              color: #fff; }
    </style>
</head>
<body>

                <!--Форма регистрации-->
    <form>

        <label>Логин</label>
        <input type="text" name="login" placeholder="Введите логин">
        <p class="error_login none ">message ewq</p>
        <label>Пароль</label>
        <input type="password" name="pass" placeholder="Введите пароль">
        <p class="error_pass none">message ewq</p>
        <label>Подтверждение пароля</label>
        <input type="password" name="confirm_pass" placeholder="Подтвердите пароль">
        <p class="error_confirm none">message ewq</p>
        <label>Почта</label>
        <input type="email" name="email" placeholder="Введите свой email">
        <p class="error_email none">message ewq</p>
        <label>Имя</label>
        <input type="text" name="name" placeholder="Введите своё имя">
        <p class="error_name none">message ewq</p>
        <button type="submit" class="reg-btn">Зарегистрироваться</button>
        <p>
            У вас уже есть аккаунт? - <a href="index.php">Авторизация</a>!

        </p>





    </form>
                <script src="assets/js/jquery-3.6.0.min.js"></script>
                <script src="assets/js/main.js"></script>
</body>
</html>
