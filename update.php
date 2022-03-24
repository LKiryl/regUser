<?php

if (isset($_GET["key"])) {
    $key = (int) $_GET["key"];
    $getFile = file_get_contents('inc/users.json');
    $jsonFile = json_decode($getFile, true);
    $jsonFile = $jsonFile[$key];
}

if (isset($_POST["key"])) {
    $key = (int) $_POST["key"];
    $getFile = file_get_contents('inc/users.json');
    $all = json_decode($getFile, true);
    $jsonFile = $all[$key];

    $post["id"] = isset($_POST["id"]) ? $_POST["id"] : "";
    $post["login"] = isset($_POST["login"]) ? $_POST["login"] : "";
    $post["pass"] = isset($_POST["pass"]) ? $_POST["pass"] : "";
    $post["email"] = isset($_POST["email"]) ? $_POST["email"] : "";
    $post["name"] = isset($_POST["name"]) ? $_POST["name"] : "";



    if ($jsonFile) {
        unset($all[$key]);
        $all[$key] = $post;
        $all = array_values($all);
        file_put_contents("inc/users.json", json_encode($all, JSON_PRETTY_PRINT));
    }
    header("Location: /db.php");
}
?>
<?php if (isset($_GET["key"])): ?>
    <form action="/update.php" method="POST">
        <input type="hidden" value="<?php echo $key ?>" name="key"/>
        <input type="text" value="<?php echo $jsonFile["id"] ?>" name="id"/>
        <input type="text" value="<?php echo $jsonFile["login"] ?>" name="login"/>
        <input type="text" value="<?php echo $jsonFile["pass"] ?>" name="pass"/>
        <input type="text" value="<?php echo $jsonFile["email"] ?>" name="email"/>
        <input type="text" value="<?php echo $jsonFile["name"] ?>" name="name"/>
        <input type="submit"/>
    </form>
<?php endif; ?>
