<?php
session_start();

if (!$_SESSION['admin']) {
  header("Location: login.php");
  exit;
}

define('PATH_ROOT', '..');

require_once('connection.php');

//вывод всех категорий 
function getAllCategories($connection)
{
  $query = 'SELECT * FROM categories';
  $result = mysqli_query($connection, $query);
  while ($row = mysqli_fetch_assoc($result)) {
    $allCategories[] = [
      'id_cat' => $row['id_cat'],
      'category' => $row['category'],
    ];
  }
  return $allCategories;
}

//вывод всех единиц 
function getAllUnits($connection)
{
  $query = 'SELECT * FROM units';
  $result = mysqli_query($connection, $query);
  while ($row = mysqli_fetch_assoc($result)) {
    $allUnits[] = [
      'id_units' => $row['id_units'],
      'units' => $row['units'],
    ];
  }
  return $allUnits;
}

//вывод всех продуктов

function getAllProducts($connection)
{
  $query = "SELECT * FROM products INNER JOIN categories ON products.category_id = categories.id_cat INNER JOIN units ON products.units_id= units.id_units_cat";
  $result = mysqli_query($connection, $query);
  while ($row = mysqli_fetch_assoc($result)) {
    $arr_products[] = [
      'id' => $row['id'],
      'title' => $row['title'],
      'description' => $row['description'],
      'category' => $row['category'],
      'price' => $row['price'],
      'units' => $row['units'],
      'path_big' => $row['path_big'],
      'path_small' => $row['path_small'],
    ];
  }
  return $arr_products;
}

function getProducts($connection, $query)
{
  $result = mysqli_query($connection, $query);
  while ($row = mysqli_fetch_assoc($result)) {
    $arr_products[] = [
      'id' => $row['id'],
      'title' => $row['title'],
      'description' => $row['description'],
      'category' => $row['category'],
      'price' => $row['price'],
      'units' => $row['units'],
      'path_big' => $row['path_big'],
      'path_small' => $row['path_small'],
    ];
  }
  return $arr_products;
}


// отправка писем
function sendMail($sub, $message)
{
  $address = "gorkundp@yandex.ru";
  $email = 'australia@freestuff47.ru'; // от кого
  $header = "Content-type:text/plain; charset = utf-8\r\nFrom:Заказ тортиков <$email>";
  if (mail($address, $sub, $message, $header)) return true;
}


//транслитерация
function translit($str)
{
  $arr = ['а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'e', 'ж' => 'j', 'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'ts', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'shch', 'ы' => 'y', 'э' => 'e', 'ю' => 'yu', 'я' => 'ya', 'ъ' => '', 'ь' => '', ' ' => '_'];
  preg_match_all('/./u', $str, $matches);
  $str = $matches[0];
  $result = [];

  foreach ($str as $symbol) {
    foreach ($arr as $t_symbol => $value) {
      if ($t_symbol == $symbol) $symbol = $value;
    }
    $result[] = $symbol;
  }
  $result = implode($result);
  return $result;
}
// создание уменьшенной копии
function imageresize($outfile, $infile, $neww, $newh, $quality)
{
  $im = imagecreatefromjpeg($infile);
  $k1 = $neww / imagesx($im);
  $k2 = $newh / imagesy($im);
  $k = $k1 > $k2 ? $k2 : $k1;

  $w = intval(imagesx($im) * $k);
  $h = intval(imagesy($im) * $k);

  $im1 = imagecreatetruecolor($w, $h);
  imagecopyresampled($im1, $im, 0, 0, 0, 0, $w, $h, imagesx($im), imagesy($im));

  imagejpeg($im1, $outfile, $quality);
  imagedestroy($im);
  imagedestroy($im1);
}
