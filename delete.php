<?php

if (isset($_GET["key"])) {
    $key = (int) $_GET["key"];
    $all = file_get_contents('inc/users.json');
    $all = json_decode($all, true);
    $jsonFile = $all[$key];

    if ($jsonFile) {
        unset($all[$key]);
        file_put_contents("inc/users.json", json_encode($all, JSON_PRETTY_PRINT));
    }
    header("Location: db.php");
}
