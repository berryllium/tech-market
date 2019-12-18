<?php

if ($_GET['act'] == 'login') {

  require_once('models/User.php');
  if (isset($_POST['login'])) {
    $user = new User($db, $_POST['login'], $_POST['pass']);
    if ($user->auth()) {
      $login = $_SESSION['login'] = $user->getLogin();
      $isAdmin = true;
    } else echo  'некорректные данные';
  }
} elseif ($_GET['act'] == 'exit') {
  session_destroy();
  $isAdmin = false;
  header('Location: index.php');
}
