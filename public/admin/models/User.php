<?
class User
{
  private $sault = 'wtrw4q42';
  private $login;
  private $pass;
  function __construct($db, $login, $pass)
  {
    $this->login = $login;
    $this->pass = $pass;
    $this->db = $db;
  }
  public function auth()
  {
    $user = $this->db->Select('users', 'login', $this->login);
    if ($user['pass'] === md5($this->pass . $this->sault)) return true;
    else return false;
  }
  public function changePass($login, $old, $new, $confirm)
  {
    $old_md5 = $this->db->Select('users', 'login', $login)['pass'];
    if (md5($old . $this->sault) === $old_md5) {
      if ($new == $confirm) {
        $new_md5 = md5($new . $this->sault);
        $this->db->Update('users', ['pass' => $new_md5], 'id', '1');
      } else
      echo 'пароль и подтверждение не совпадают';
    } else
    echo 'пароль неверный';
  }
  public function getLogin()
  {
    return $this->login;
  }
}
