<?php
session_start();

if (!$_SESSION['admin']) {
  header("Location: login.php");
  exit;
}

require_once 'connection.php';
require_once 'functions.php';

$allCategories = getAllCategories($connection);
$allUnits = getallUnits($connection);

if (isset($_GET['id'])) {
  $single = $_GET['id'];
  $query = "SELECT * FROM products WHERE id = '$single'";
  $action = "edit";
} else {
  $query = 'SELECT * FROM products';
  $action = "create";
}
$query .= ' INNER JOIN categories ON products.category_id = categories.id_cat INNER JOIN units ON products.units_id= units.id_units';
$arr_products = getProducts($connection, $query);


?>

<?php include_once('header.php') ?>
<div class="form col-md-6 col-12">
  <form action="upload.php" method="POST" enctype="multipart/form-data" class="flex columns">
    <input type="text" name="title" id="title" placeholder="Название" required>
    <select name="category" id="category" required>
      <?php foreach ($allCategories as $el => $value) : ?>
        <option value="<?= $value['id_cat'] ?>"><?= $value['category'] ?></option>
      <?php endforeach; ?>
    </select>
    <input type="number" name="price" id="price" placeholder="Цена" required>
    <select name="units" id="units" placeholder="Единицы" required>
      <?php foreach ($allUnits as $el => $value) : ?>
        <option value="<?= $value['id_units'] ?>"><?= $value['units'] ?></option>
      <?php endforeach; ?>
    </select>
    <textarea type="text" name="desc" id="decs" placeholder="Описание" required></textarea>
    <input type="file" name="photo" id="photo" accept="image/jpeg" required>
    <input type="submit" value="Добавить товар">
  </form>
</div>
<table class="col-12">
  <tr>
    <th>Фото</th>
    <th>Название</th>
    <th>Категория</th>
    <th>Описание</th>
    <th>Цена</th>
    <th>Единицы</th>
    <th>Редактировать</th>
    <th>Удалить</th>
  </tr>
  <?php
  // вывод товаров из базы
  if ($arr_products) :
    foreach ($arr_products as $key => $item) : ?>
      <tr>
        <td> <img class="example-image" src="<?= PATH_ROOT . $item['path_small'] ?>" alt="<?= $item['title'] ?>" /> </td>
        <td> <?= $item['title'] ?> </td>
        <td><?= $item['category'] ?> </td>
        <td> <?= $item['description'] ?> </td>
        <td> <?= $item['price'] ?> </td>
        <td> <?= $item['units'] ?> </td>
        <td> <a class="edit-link" href="<?= 'single.php?id=' . $item['id'] ?>" target="_blank">Редактировать</a></td>
        <td> <a class="delete-link" href="<?= 'upload.php?delete=&id=' . $item['id'] . '&small=' . $item['path_small'] . '&big=' . $item['path_big'] ?>">&times;</a></td>

      </tr>
  <?php endforeach;
  else : echo '<h3 class="col-12">добавьте товары</h3>';
  endif; ?>
</table>

<?php include_once('footer.php') ?>