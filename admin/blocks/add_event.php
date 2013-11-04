<?
  include "connect_db.php";
  if(isset($_POST['home']) && isset($_POST['away']) && isset($_POST['start_time'])) {
    $home = trim($_POST['home']);
    $away = trim($_POST['away']);
    $start_time = trim($_POST['start_time']);
    $query = sprintf("INSERT INTO events (home, away, start_time) VALUES ('%s','%s','%s')", $home, $away, $start_time);
    mysql_query($query);
    echo '<meta http-equiv="refresh" content="0;URL=../index.php">';
  } else echo '<meta http-equiv="refresh" content="0;URL=../add_event.php">';
?>