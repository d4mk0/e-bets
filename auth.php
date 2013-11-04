<?
  include "blocks/connect_db.php";
  if(isset($_POST['login']) && isset($_POST['password'])) {
    $login = trim($_POST['login']);
    $pass = trim($_POST['password']);
    $query = sprintf("SELECT * FROM users WHERE login='%s' AND password='%s'", $login, $pass);
    $result = mysql_query($query);
    if((mysql_num_rows($result) == 0)) echo '<meta http-equiv="refresh" content="0;URL=autorization.php">';
    else {
      $row = mysql_fetch_array($result);
      $str = $row['login']+$row['password']+time();
      $hash = md5($str);
      $query = sprintf("UPDATE users SET secret = '%s' WHERE login='%s' AND password='%s'", $hash, $login, $pass);
      mysql_query($query);
      setcookie("bsecret", $hash);
      echo '<meta http-equiv="refresh" content="0;URL=index.php">';
    }
  } else if(isset($_GET['kill'])) {
      setcookie("bsecret", "", time()-3600);
    echo '<meta http-equiv="refresh" content="0;URL=index.php">';
  } else echo '<meta http-equiv="refresh" content="0;URL=autorization.php">';

?>