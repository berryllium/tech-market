<?php
require_once('models/Catalog.php');
$catalog = new Catalog($db);

if(!empty($_POST)) {
  $catalog->db->Update('contacts', $_POST, 'id', '1');
}


$contacts = $catalog->db->Select('contacts', 'id', '1');

$data = array('contacts' => $contacts);