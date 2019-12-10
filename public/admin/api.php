<?php

require_once('connection.php');

//  $query = 'SELECT * FROM products INNER JOIN categories ON products.category_id = categories.id_cat  INNER JOIN units ON products.units_id = units.id_units';
 $query = 'SELECT * FROM products';
  $result = mysqli_query($connection, $query);
  while ($row = mysqli_fetch_assoc($result)) {
    ehco $row['title'];
    // $object = new stdClass();
    // $object->id = (int) $row['id'];
    // $object->name = $row['title'];
    // $object->desc = $row['description'];
    // $object->category = $row['category'];
    // $object->price = (int) $row['price'];
    // $object->units = $row['units'];
    // $object->img = $row['path_small'];
    // $object->img_big = $row['path_big'];
    // $data[] = $object;
  }
  echo json_encode($data, JSON_UNESCAPED_UNICODE);

