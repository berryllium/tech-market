<?php

require_once('models/Order.php');

$list = new Order;


$orders = $list->getAll();

$data = array('orders' => $orders);
