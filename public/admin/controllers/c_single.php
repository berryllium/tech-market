<?php
require_once('models/Catalog.php');
$id = $_GET['id'];
$catalog = new Catalog($db);

$data = array('product' => $catalog->getProduct($id), 'categories' => $catalog->getCategories());

