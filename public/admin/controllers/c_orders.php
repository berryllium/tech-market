<?php

require_once('models/Order.php');

$list = new Order;

if(isset($_GET['id']) && $_GET['act'] == 'done') {
  $list->done($_GET['id']);
}


$orders = $list->getAll();

$data = array('orders' => $orders);
