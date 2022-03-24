<?php
    session_start();

    if(!$_SESSION['user']){
        header('Location: index.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <title>Пользователь авторизован</title>
        <link rel="icon" href="uploads/icon.ico">
        <link rel="stylesheet" href="assets/css/main.css">
        <style>
          body {  background: url(uploads/2.jpg);
                  }
        </style>
</head>
<body>
                     <div>
                     <h1>Hello <?= $_SESSION['user'] ?></h1>


                     <a href="inc/logout.php" class="logout">Выход</a>

                     </div>

                     <script src="assets/js/jquery-3.6.0.min.js"></script>
                     <script src="assets/js/main.js"></script>
</body>
</html>
