<?php
require_once('models/Catalog.php');
$catalog = new Catalog;

if ($_GET['act'] == 'order') {
  require_once('models/Order.php');
  $order = new Order;
  $order->save($_POST);
  echo 'Заказ оформлен';
  exit;
}

if ($_GET['act'] == 'feedback') {
  $catalog->saveFeedback($_POST['feedback']);
  echo 'Отзыв записан';
  exit;
}

$products = $catalog->getAll();
$categories = $catalog->getCategories();
$feedbacks = $catalog->getShopFeedbacks();


$data = ['products' => $products, 'categories' => $categories, 'feedbacks' => $feedbacks];

echo json_encode($data, JSON_UNESCAPED_UNICODE);
