<?php
class Feedback {
  function __construct()
  {
    $this->db = SQL::Instance();
  }
  public function save($feedback) {
    print_r($feedback);
      $this->db->Insert('feedbacks', $feedback);
  }
}