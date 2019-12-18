<?php
class Order
{
  function __construct()
  {
    $this->db = SQL::Instance();
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
      $query = "SELECT  
    `title`,`count`
    FROM purchases INNER JOIN  products ON products.id = purchases.id_prod ";
      $products = $this->db->CompositeQuery($query);
      $str = '';
      foreach ($products as $key => $value) {
        $str .= $value['title'] . ' - ' . $value['count'] . 'шт. ';
        $v['products'] = $str;
      }
      $full[] = $v;
    }
    return $full;
  }
}
