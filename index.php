<?php
    session_start();
    unset($_SESSION['user']);
    if($_SESSION['user']){
        header('Location: loggedin.php');
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <link rel="icon" href="uploads/icon.ico">
    <link rel="stylesheet" href="assets/css/main.css">
    <style>
      body {  background: url(uploads/1.jpg);
              color: #fff; }
    </style>
</head>
<body>

                <!--Форма авторизации-->
    <form>
        <label>Логин </label>
        <input type="text" name="login"  placeholder="Введите свой логин">
        <label>Пароль </label>
        <input type="password" name="pass" placeholder="Введите пароль">
        <button type="submit" class="login-btn">Войти</button>
        <p>
          У вас нет аккаунта? - <a href="reg.php">Зарегистрируйтесь</a>!

        </p>

        <p class="msg none">message ewq</p>


    </form>

    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>
