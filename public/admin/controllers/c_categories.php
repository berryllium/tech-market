<?php
require_once('models/Catalog.php');

$catalog = new Catalog($db);

if (isset($_GET['id'])) $id = $_GET['id'];

if ($_GET['act'] == 'del') {
  $catalog->db->Delete('categories', 'id', $id);
}

if ($_GET['act'] && !empty($_POST)) {
  $catalog->setCatImg($_POST, $_FILES['img'], $_GET['act']);
}

// удаление характеристики
if ($_GET['act'] == 'delprop') {
  $catalog->db->Delete('properties', 'id', $_GET['id']);
}

$categories = $catalog->getCategories();
$data = array('categories' => $categories);
