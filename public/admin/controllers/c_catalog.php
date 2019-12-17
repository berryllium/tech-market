<?php
require_once('models/Catalog.php');
$catalog = new Catalog($db);
if ($act == 'del') {
  $catalog->removeProduct($id_prod);
  $data = array('products' => $catalog->getAll());
  $view = 'v_catalog.tmpl';
} elseif ($act == 'edit') {
  $catalog->updateProduct($_POST, $_FILES);
  $data = $catalog->getProduct($id_prod);
  $view = 'v_single.tmpl';
} elseif ($act == 'add') {
  $id = $catalog->addProduct($_POST, $_FILES);
  $data = array('products' => $catalog->getAll(), 'categories' => $catalog->getCategories());
  $view = 'v_catalog.tmpl';
} elseif ($id) {
  $data = $catalog->getProduct($id_prod);
  $view = 'v_product.tmpl';
} else {
  $data = array('products' => $catalog->getAll(), 'categories' => $catalog->getCategories());
  $view = 'v_catalog.tmpl';
}
