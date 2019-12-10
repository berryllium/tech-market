<?php
session_start();

if (!$_SESSION['admin']) {
  header("Location: login.php");
  exit;
}

require_once 'connection.php';
require_once 'functions.php';

if (isset($_GET['units'])) $action_units = $_GET['units'];
if (isset($_GET['id_units'])) $action_id = $_GET['id_units'];
if (isset($_GET['create'])) {
  $query = "INSERT INTO units (units) VALUES ('$action_units')";
  $result = mysqli_query($connection, $query);
  if ($result) header("Location: " . PATH_ROOT . "/admin/units.php");
  else echo header("Location: " . PATH_ROOT . "/admin/units.php");
} elseif (isset($_GET['delete'])) {
  $query = "DELETE FROM units WHERE id_units = '$action_id'";
  $result = mysqli_query($connection, $query);
  if ($result) header("Location: " . PATH_ROOT . "/admin/units.php");
  else echo 'ошибка удаления';
} elseif (isset($_GET['update'])) {
  $query = "UPDATE `units` SET `units` = '$action_units' WHERE `id_units` = '$action_id'";
  $result = mysqli_query($connection, $query);
  if ($result) header("Location: " . PATH_ROOT . "/admin/units.php");
  else echo 'ошибка обновления';
}

  $allUnits = getallUnits($connection);

?>

<?php include_once('header.php') ?>
<div class="form col-md-6 col-12">
  <form class="flex columns">
    <input type="text" name="units" id="title" placeholder="Категория" required>
    <input name="create" type="submit" value="Добавить категорию">
  </form>
</div>
<table class="col-12">
  <tr>
    <th>id</th>
    <th>Категория</th>
    <th>Удалить</th>
  </tr>
  <?php
  // вывод товаров из базы
  if ($allUnits) :
    foreach ($allUnits as $key => $item) : ?>
      <tr>
        <td> <?= $item['id_units'] ?> </td>
        <td>
          <form>
            <input type="text" name="units" value="<?= $item['units'] ?>">
            <input hidden type="text" name="id_units" value="<?= $item['id_units'] ?>">
            <input type="submit" name="update" value="Изменить">
          </form>
        <td> <a class="delete-link" href="<?= 'units.php?delete=true&id_units=' . $item['id_units'] . '&units=' . $item['units'] ?>">&times;</a></td>

      </tr>
  <?php endforeach;
  else : echo '<h3 class="col-12">добавьте товары</h3>';
  endif; ?>
</table>

<?php include_once('footer.php') ?>