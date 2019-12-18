<?php
if ($_GET['act'] == 'change') {
require_once('models/User.php');
if (isset($_POST['login'])) {
  $user = new User($db, $_POST['login'], $_POST['old']);
  $user->changePass($_SESSION['login'], $_POST['old'], $_POST['new'], $_POST['con']);
  }
}