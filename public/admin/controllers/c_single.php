<?php
require_once('models/Catalog.php');
$id = $_GET['id'];
$catalog = new Catalog($db);

if($_GET['id_img']) {
  $id_img = $_GET['id_img'];
  $catalog->db->Delete('photos', 'id', $id_img);
}

if(!empty($_POST)) {
  print_r($_POST);
}


$specifications = $catalog->db->Select('specifications', 'id_prod', $id, true);
$photos = $catalog->db->Select('photos', 'id_prod', $id, true);
print_r($photos);
$data = array(
  'product' => $catalog->getProduct($id),
  'categories' => $catalog->getCategories(),
  'specifications' => $specifications,
  'photos' => $photos,
);
