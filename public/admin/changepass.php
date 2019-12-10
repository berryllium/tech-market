<?php
session_start();

if (!$_SESSION['admin']) {
    header("Location: login.php");
    exit;
}

require_once 'connection.php';
$sault = 'wtrg5yw4q%42';
$reg = '/^\S*(?=\S{8,25})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/';

if ($_POST['submit']) {
    $pass_old = $_POST['pass_old'];
    $pass_new = $_POST['pass_new'];
    $pass_reply = $_POST['pass_reply'];

    if ($pass_new !== $pass_reply) {
        echo 'пароли не совпадают';
    } else {
        $user = $_SESSION['admin'];
        $query = "SELECT `pass` FROM `users` WHERE `login` = '$user'";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result);
        if (md5($pass_old . $sault) !== $row['pass']) echo 'неверный старый пароль';
        else {
            if (!preg_match($reg, $pass_new)) echo 'Пароль должен состоять из 8 - 25 латинских символов, цифр, строчный и прописных букв';
            else {
                $md5_new = md5($pass_new . $sault);
                $query = "UPDATE `users` SET `pass` = '$md5_new' WHERE `login` = '$user'";
                $result = mysqli_query($connection, $query);
                if ($result) {
                    echo 'Пароль успешно изменен!';
                } else {
                    echo '<p>Смена пароля не состоялась</p>';
                }
            }
        }
    }
}

?>

<?php include_once 'header.php' ?>
<h2 class="col-12">Смена пароля</h2>
<div class="col-md-6 col-12 m-auto">
    <form method="post">
        <input type="password" name="pass_old" id="pass_old" placeholder="Старый пароль" /><br />
        <input type="password" name="pass_new" id="pass_new" placeholder="Новый пароль" /><br />
        <input type="password" name="pass_reply" id="pass_reply" placeholder="Повторите пароль" /><br />
        <input type="submit" name="submit" value="Сменить пароль" />
    </form>
</div>
<?php include_once 'footer.php' ?>