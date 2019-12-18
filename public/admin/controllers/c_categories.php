<?php
require_once('models/Catalog.php');

$catalog = new Catalog($db);

if (isset($_GET['id'])) $id = $_GET['id'];

if ($_GET['act'] == 'del') {
  $catalog->db->Delete('categories', 'id', $id);
}

if ($_GET['act'] == 'add' && !empty($_POST)) {
  $category = $_POST;
  $category['id'] = $catalog->db->Insert('categories', $category);
  if($_FILES['img']['name']) {
    $img = $_FILES['img'];
    $category['img'] = translit($img['name']);
    $folder = '../db/images/category/'.$category['id'].'/';
    $path = $folder.$category['img'];
    if(!file_exists($folder)) mkdir($folder, 0700, true);
    move_uploaded_file($img['tmp_name'], $path);
  }
  $catalog->db->Update('categories', $category, 'id', $category['id']);
}

if ($_GET['act'] == 'update' && !empty($_POST)) {
  $category = $_POST;
  if($_FILES['img']['name']) {
    $img = $_FILES['img'];
    $category['img'] = translit($img['name']);
    $folder = '../db/images/category/'.$category['id'].'/';
    $path = $folder.$category['img'];
    if(!file_exists($folder)) mkdir($folder, 0700, true);
    move_uploaded_file($img['tmp_name'], $path);
  }

  $catalog->db->Update('categories', $category, 'id', $category['id']);
}

$categories = $catalog->db->Select('categories');

$data = array('categories' => $categories);
