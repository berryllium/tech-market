<?php

require_once('connection.php');

function getProducts($connection) {
$query = 'SELECT *, products.title AS title, categories.name AS category FROM products 
INNER JOIN categories ON products.id_cat = categories.id';

$result = mysqli_query($connection, $query);
$products = [];
while ($row = mysqli_fetch_assoc($result)) {
  $product = [];
  $photos = getPhotos($connection, $row['id']);
  $feedbacks = getFeedbacks($connection, $row['id']);
  foreach($row as $k=>$v) {
     $product[$k] = $v;
     $product['photos'] = $photos;
     $product['feedbacks'] = $feedbacks;
    }
    $products[] = $product;
}
return $products;
}


function getPhotos($connection, $id) {
  $query = "SELECT * FROM `photos` WHERE `id_prod` = '$id'";
  $result = mysqli_query($connection, $query);
  $photos = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $photo = [];
    foreach($row as $k=>$v) {
     $photo[$k] = $v;
    }
     $photos[] = $photo;
  }
  return $photos;
}

function getFeedbacks($connection, $id) {
  $query = "SELECT * FROM `feedbacks` WHERE `id_prod` = '$id'";
  $result = mysqli_query($connection, $query);
  $feedbacks = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $feedback = [];
    foreach($row as $k=>$v) {
     $feedback[$k] = $v;
    }
    $feedbacks[] = $feedback;
  }
  return $feedbacks;
}


function getCategories($connection) {
  $query = "SELECT DISTINCT `name`, img FROM `categories`";
  $result = mysqli_query($connection, $query);
  $categories = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $categories[] = $row;
  }
  return $categories;
}

function getShopFeedbacks($connection) {
  $query = "SELECT * FROM `feedbacks` WHERE `id_prod` = 0";
  $result = mysqli_query($connection, $query);
  $feedbacks = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $feedbacks[] = $row;
  }
  return $feedbacks;
}

$products = getProducts($connection);
$categories = getCategories($connection);
$feedbacks = getShopFeedbacks($connection);


$data = ['products' => $products, 'categories' => $categories, 'feedbacks' => $feedbacks];

echo json_encode($data, JSON_UNESCAPED_UNICODE);
