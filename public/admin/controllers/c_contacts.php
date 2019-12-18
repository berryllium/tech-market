<?php
require_once('models/Catalog.php');
$catalog = new Catalog($db);

if(!empty($_POST)) {
  if ($catalog->db->Select('contacts', 'id', '1')) {
    $catalog->db->Update('contacts', $_POST, 'id', '1');
  } else $catalog->db->Insert('contacts', $_POST, 'id', '1');
}


$contacts = $catalog->db->Select('contacts', 'id', '1');

$data = array('contacts' => $contacts);