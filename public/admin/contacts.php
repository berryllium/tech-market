<?php
session_start();

if (!$_SESSION['admin']) {
  header("Location: login.php");
  exit;
}

require_once 'connection.php';

if (isset($_POST['contacts'])) {
  extract($_POST);
  $query = "UPDATE `contacts` SET `phone` = '$phone', `email` = '$email', `address` = '$address', 
  `work` = '$work', `header` = '$header', `hometext` = '$hometext', `about` = '$about', `delivery` = '$delivery',
  `vk` = '$vk', `ok` = '$ok', `inst` = '$inst'
  WHERE `contacts`.`id` = 1";

  $result = mysqli_query($connection, $query);
  if ($result) echo 'данные сохранены';
  else die('ошибка сохранения данных');
}

$query = 'SELECT * FROM contacts WHERE `contacts`.`id` = 1';
$result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($result)) {
  $phone = $row['phone'];
  $email = $row['email'];
  $address = $row['address'];
  $vk = $row['vk'];
  $ok = $row['ok'];
  $inst = $row['inst'];
  $work = $row['work'];
  $header = $row['header'];
  $hometext = $row['hometext'];
  $about = $row['about'];
  $delivery = $row['delivery'];
}

?>
<?php include_once('header.php') ?>
<h2 class="col-12">Контактная информация</h2>
<div class="form col-md-6 col-12">
  <form method="post" class="flex columns">
    <input type="phone" name="phone" id="phone" placeholder="Телефон" value="<?= $phone ?>" required>
    <input type="email" name="email" id="email" placeholder="Email" value="<?= $email ?>" required>
    <input type="text" name="vk" id="vk" placeholder="Вконтакте" value="<?= $vk ?>">
    <input type="text" name="ok" id="ok" placeholder="Одноклассники" value="<?= $ok ?>">
    <input type="text" name="inst" id="inst" placeholder="Инстаграм" value="<?= $inst ?>">
    <input type="text" name="address" id="address" placeholder="Адрес" value="<?= $address ?>" required>
    <input type="text" name="work" id="work" placeholder="Режим работы" value="<?= $work ?>" required>
    <input type="text" name="header" id="header" placeholder="Заголовок на главной" value="<?= $header ?>" required>
    <textarea name="hometext" id="hometext" placeholder="Текст на главной" required><?= $hometext ?></textarea>
    <textarea name="about" id="about" placeholder="О нас" required><?= $about ?></textarea>
    <textarea name="delivery" id="delivery" placeholder="Доставка" required><?= $delivery ?></textarea>
    <input type="submit" name="contacts" value="Внести изменения">
  </form>
</div>
<?php include_once('footer.php') ?>