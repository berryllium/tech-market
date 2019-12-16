<?php
session_start();

if (!$_SESSION['admin']) {
  header("Location: login.php");
  exit;
}

require_once 'connection.php';
require_once 'functions.php';

if (isset($_GET['category'])) $action_category = $_GET['category'];
if (isset($_GET['id_cat'])) $action_id = $_GET['id_cat'];
if (isset($_GET['create'])) {
  $query = "INSERT INTO categories (category) VALUES ('$action_category')";
  $result = mysqli_query($connection, $query);
  if ($result) header("Location: " . PATH_ROOT . "/admin/categories.php");
  else echo header("Location: " . PATH_ROOT . "/admin/categories.php");
} elseif (isset($_GET['delete'])) {
  $query = "DELETE FROM categories WHERE id_cat = '$action_id'";
  $result = mysqli_query($connection, $query);
  if ($result) header("Location: " . PATH_ROOT . "/admin/categories.php");
  else echo 'ошибка удаления';
} elseif (isset($_GET['update'])) {
  $query = "UPDATE `categories` SET `category` = '$action_category' WHERE `id_cat` = '$action_id'";
  $result = mysqli_query($connection, $query);
  if ($result) header("Location: " . PATH_ROOT . "/admin/categories.php");
  else echo 'ошибка обновления';
}

  $allCategories = getAllCategories($connection);

?>

<?php include_once('header.php') ?>
<div class="form col-md-6 col-12">
  <form class="flex columns">
    <input type="text" name="category" id="title" placeholder="Категория" required>
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
  if ($allCategories) :
    foreach ($allCategories as $key => $item) : ?>
      <tr>
        <td> <?= $item['id_cat'] ?> </td>
        <td>
          <form>
            <input type="text" name="category" value="<?= $item['category'] ?>">
            <input hidden type="text" name="id_cat" value="<?= $item['id_cat'] ?>">
            <input type="submit" name="update" value="Изменить">
          </form>
        <td> <a class="delete-link" href="<?= 'categories.php?delete=true&id_cat=' . $item['id_cat'] . '&category=' . $item['category'] ?>">&times;</a></td>

      </tr>
  <?php endforeach;
  else : echo '<h3 class="col-12">добавьте товары</h3>';
  endif; ?>
</table>

<?php include_once('footer.php') ?>