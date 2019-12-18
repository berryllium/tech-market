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
  public function setCatImg($category, $img, $action)
  {
    $category['img'] = translit($img['name']);
    if ($action == 'update') {
      $folder = '../db/images/category/' . $category['id'] . '/';
      $path = $folder . $category['img'];
      if (!file_exists($folder)) mkdir($folder, 0700, true);
      move_uploaded_file($img['tmp_name'], $path);
      $this->db->Update('categories', $category, 'id', $category['id']);
    } elseif ($action == 'add') {
      $category['id'] = $this->db->Insert('categories', $category);
      $folder = '../db/images/category/' . $category['id'] . '/';
      $path = $folder . $category['img'];
      if (!file_exists($folder)) mkdir($folder, 0700, true);
      move_uploaded_file($img['tmp_name'], $path);
      $this->db->Update('categories', $category, 'id', $category['id']);
    }
  }
  public function getShopFeedbacks()
  {
    return $this->db->Select('feedbacks', 'id_prod', '-1', true);
  }
  public function saveFeedback($feedback)
  {
    print_r($feedback);
    $this->db->Insert('feedbacks', $feedback);
  }
  public function getAll()
  {
    $result = $this->db->CompositeQuery('SELECT 
    products.id AS id, 
    products.title AS title,   
    products.detail AS detail,   
    products.features AS features, 
    products.price_new AS price_new, 
    products.price_old AS price_old, 
    categories.name AS category,
    categories.img AS cat_img FROM products
    INNER JOIN categories ON products.id_cat = categories.id');
    $products = [];
    foreach ($result as $k => $v) {
      $product = [];
      $product['desc'] = $v['detail'];
      $product['photos'] = $this->db->Select('photos', 'id_prod', $v['id'], true);
      $product['feedbacks'] = $this->db->Select('feedbacks', 'id_prod', $v['id'], true);
      $product['spec'] = $this->db->Select('specifications', 'id_prod', $v['id'], true);
      foreach ($v as $key => $value) {
        $product[$key] = $value;
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
    // return $this->db->Insert('products', $product);
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
      'detail' => $desc,
      'features' => $features,
      'price_new' => $price_new,
      'price_old' => $price_old,
      'id_cat' => $id_cat
    ];

    if ($id) {
      $this->db->Update('products', $product, 'id', $id);
    } else {
      $id = $this->db->Insert('products', $product);
    }


    for ($k = 0; $k < count($id_spec); $k++) {
      if ($id_spec[$k]) {
        $this->db->Update('specifications', [
          'id_prod' => $id,
          'prop' => $spec_prop[$k],
          'value' => $spec_val[$k]
        ], 'id', $id_spec[$k]);
      } else {
        $this->db->Insert('specifications', [
          'id_prod' => $id,
          'prop' => $spec_prop[$k],
          'value' => $spec_val[$k]
        ]);
      }
    }

    if (($files['photo']['name'][0])) {
      $files = $files['photo'];
      for ($i = 0; $i < count($files['name']); $i++) {
        $photo['id_prod'] = $id;
        $photo['alt'] = $files['name'][$i];
        $photo['src'] = substr(md5_file($files['tmp_name'][$i]), -10) . '_' . translit($files['name'][$i]);
        $this->db->Insert('photos', $photo);
        $path_big = "../db/images/products/big/$id/";
        $path_small = "../db/images/products/small/$id/";
        if (!file_exists("../db/images/products/small/$id/")) {
          mkdir($path_big, 0700, true);
          mkdir($path_small, 0700, true);
        }
        $mas = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($files['type'][$i], $mas)) {
          if (move_uploaded_file($files['tmp_name'][$i], $path_big . $photo['src'])) {
            imageresize($path_small . $photo['src'], $path_big . $photo['src'], 400, 250, 75);
          } else echo 'файлы не найдены';
        } else echo 'Можно загрузить только изображения в формате .jpg, .png или .gif';
      }
    }
    return $product;
  }
}
