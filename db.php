
<?php
$getFile = file_get_contents('inc/users.json');
$jsonFile = json_decode($getFile);
?>
                   <!--База пользователей-->
<table align="center">
    <tr>
         <th>Id</th>
        <th>Логин</th>
        <th>Пароль</th>
        <th>Email</th>
        <th>Имя</th>
        <th></th>
    </tr>
    <tbody>
        <?php foreach ($jsonFile as $index => $obj): ?>
            <tr>
                <td><?php echo $obj->id; ?></td>
                <td><?php echo $obj->login; ?></td>
                <td><?php echo $obj->pass; ?></td>
                <td><?php echo $obj->email; ?></td>
                <td><?php echo $obj->name; ?></td>
                <td>
                    <a href="/update.php?key=<?php echo $index; ?>">Edit</a>
                    <a href="/delete.php?key=<?php echo $index; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
