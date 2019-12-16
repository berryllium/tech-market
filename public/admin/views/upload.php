<?php

session_start();

if (!$_SESSION['admin']) {
    header("Location: login.php");
    exit;
}

require_once('functions.php');
require_once('connection.php');
$mas = ['image/jpeg', 'image/png', 'image/gif'];

if ($_POST) {
    extract($_POST);
    $photo = $_FILES['photo'];
    if ($photo['tmp_name']) {
        $photo_name = substr(md5_file($photo['tmp_name']), -10) . '_' . translit($photo['name']);
        $path_big = '/db/images/big/';
        $path_small = '/db/images/small/';

        if (in_array($photo['type'], $mas)) {
            if (move_uploaded_file($photo['tmp_name'], PATH_ROOT . $path_big . $photo_name)) {
                imageresize(PATH_ROOT . $path_small . $photo_name, PATH_ROOT . $path_big . $photo_name, 320, 320, 75);
                $big = $path_big . $photo_name;
                $small = $path_small . $photo_name;

                if ($id) {
                    $query = "UPDATE `products` SET `title` = '$title', `category_id` = '$category', `description` = '$desc', `price` = '$price', `units_id` = '$units', `path_big` = '$big', `path_small` = '$small' WHERE `products`.`id` = '$id';";
                } else $query = "INSERT INTO `products` (`id`, `title`, `description`, `category_id`, `price`, `units_id`, `path_big`, `path_small`) VALUES (NULL, '$title', '$desc', '$category', '$price', '$units', '$big', '$small');";
            }
        } else echo 'Можно загрузить только изображения в формате .jpg, .png или .gif';
    } else $query = "UPDATE `products` SET `title` = '$title', `category_id` = '$category', `description` = '$desc', `price` = '$price', `units_id` = '$units' WHERE `products`.`id` = '$id';";
} elseif (isset($_GET['delete'])) {
    $id = $_GET['id'];
    $small = PATH_ROOT . $_GET['small'];
    $big = PATH_ROOT . $_GET['big'];
    $query = "DELETE FROM `products` WHERE `products`.`id` = '$id'";
    if (file_exists($small)) unlink($small);
    if (file_exists($big)) unlink($big);
} else echo 'Ошибка удаления';

$result = mysqli_query($connection, $query);
if ($result) header("Location: " . PATH_ROOT . "/admin/index.php");
else {
    echo 'Ошибка записи в БД ';
    var_dump($connection->error);
}
