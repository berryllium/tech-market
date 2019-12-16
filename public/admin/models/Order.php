<?php
class Order {
  function __construct()
  {
    $this->db = SQL::Instance();
  }
  public function save($order) {
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
}