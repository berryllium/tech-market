<?php
class Order
{
  function __construct()
  {
    $this->db = SQL::Instance();
  }
  public function sendOrder($order)
  {
  }
  public function save($order)
  {
    $user = $order['user'];
    $goods = $order['cart'];
    $id_order = $this->db->Insert('orders', $user);
    foreach ($goods as $k => $v) {
      $good['id_order'] = $id_order;
      $good['id_prod'] = $v['id'];
      $good['count'] = $v['count'];
      $this->db->Insert('purchases', $good);
    }
  }
  public function getAll()
  {
    $orders = $this->db->Select('orders');
    $full = [];
    foreach ($orders as $k => $v) {
      $v['products'] = $this->getProducts($v['id']);
      $full[] = $v;
    }
    return $full;
  }
  public function done($id)
  {
    $this->db->Update('orders', ['status' => 'done'], 'id', $id);
  }
  public function getProducts($id)
  {
    $query = "SELECT  `title`,`count`
  FROM purchases INNER JOIN  products ON products.id = purchases.id_prod WHERE purchases.id_order = '$id'";
    $products = $this->db->CompositeQuery($query);
    $str = '';
    foreach ($products as $key => $value) {
      $str .= $value['title'] . ' - ' . $value['count'] . 'шт. ';
    }
    return $str;
  }
}
