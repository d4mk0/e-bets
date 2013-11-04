<?
  include "connect_db.php";
  if(isset($_POST['login']) && isset($_POST['password'])) {
    $login = trim($_POST['login']);
    $pass = trim($_POST['password']);
    $query = sprintf("INSERT INTO users (login, password) VALUES ('%s','%s')", $login, $pass);
    mysql_query($query);
    echo '<meta http-equiv="refresh" content="0;URL=../index.php?registered=true">';
  } else echo '<meta http-equiv="refresh" content="0;URL=../register.php">';
?>