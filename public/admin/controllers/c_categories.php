<?php
require_once('models/Catalog.php');

$catalog = new Catalog($db);

if (isset($_GET['id'])) $id = $_GET['id'];

if ($_GET['act'] == 'del') {
  $catalog->db->Delete('categories', 'id', $id);
}

if ($_GET['act'] == 'add' && !empty($_POST)) {
  $catalog->db->Insert('categories', $_POST);
}

if ($_GET['act'] == 'update' && !empty($_POST)) {
  $catalog->db->Update('categories', $_POST, 'id', $_POST['id']);
}

$categories = $catalog->db->Select('categories');

$data = array('categories' => $categories);
