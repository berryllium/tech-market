<?php
define('HOST', 'localhost');
define('DB', 'shop_tech');
define('LOGIN', 'root');
define('PASSWORD', 'f');

$connection = mysqli_connect(HOST,LOGIN,PASSWORD,DB) or die ('Ошибка подлючения к БД');