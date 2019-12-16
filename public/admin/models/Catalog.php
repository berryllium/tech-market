<?php
class Catalog
{
  function __construct()
  {
    $this->db = SQL::Instance();
  }
  public function getCategories()
  {
    return $this->db->Select('categories');
  }
  public function getShopFeedbacks()
  {
    return $this->db->Select('feedbacks', 'id_prod', 0, true);
  }
  public function getAll()
  {
    $result = $this->db->CompositeQuery('SELECT 
    products.id AS id, 
    products.title AS title,   
    products.desc,   
    products.features AS features, 
    products.price_new AS price_new, 
    products.price_old AS price_old, 
    categories.name AS category,
    categories.img AS cat_img FROM products
    INNER JOIN categories ON products.id_cat = categories.id');
    $products = [];
    foreach ($result as $k => $v) {
      $product = [];
      $photos = $this->db->Select('photos', 'id_prod', $v['id'], true);
      $spec = $this->db->Select('specifications', 'id_prod', $v['id'], true);
      $feedbacks = $this->db->Select('feedbacks', 'id_prod', $v['id'], true);
      foreach ($v as $key => $value) {
        $product[$key] = $value;
        $product['photos'] = $photos;
        $product['feedbacks'] = $feedbacks;
        $product['spec'] = $spec;
      }
      $products[] = $product;
    }
    return $products;
  }
  public function getProduct($id)
  {
    return $this->db->Select('products', 'id', $id);
  }
  public function addProduct($post, $files)
  {
    $product = $this->prepareProduct($post, $files);
    return $this->db->Insert('products', $product);
  }
  public function updateProduct($post, $files)
  {
    $product = $this->prepareProduct($post, $files);
    return $this->db->Update('products', $product, 'id', $product['id']);
  }
  public function removeProduct($id)
  {
    $this->db->Delete('products', 'id', $id);
  }
  public function prepareProduct($post, $files)
  {
    extract($post);

    $product = [
      'title' => $title,
      'desc' => $desc,
      'features' => $features,
      'price_new' => $price_new,
      'price_old' => $price_old,
      'id_cat' => $id_cat
    ];
    if ($id) $product['id'] = $id;
    $photo = $files['photo'];
    if ($photo['tmp_name']) {
      $photo_name = substr(md5_file($photo['tmp_name']), -10) . '_' . translit($photo['name']);
      $path_big = 'img/big/';
      $path_small = 'img/small/';
      $mas = ['image/jpeg', 'image/png', 'image/gif'];
      if (in_array($photo['type'], $mas)) {
        if (move_uploaded_file($photo['tmp_name'], $path_big . $photo_name)) {
          imageresize($path_small . $photo_name, $path_big . $photo_name, 400, 250, 75);
          $big = $path_big . $photo_name;
          $small = $path_small . $photo_name;
          $product['path_big'] = $big;
          $product['path_small'] = $small;
        }
      } else return 'Можно загрузить только изображения в формате .jpg, .png или .gif';
    }
    return $product;
  }
}
