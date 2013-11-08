<?
  preg_match_all('/(.*) (\d.\d{2})/', $_POST['bets'], $matches);
  if(empty($matches[1])) echo '<meta http-equiv="refresh" content="0;URL=../add_event.php?error=bets">';
    
  include "connect_db.php";
  if($_POST['home'] != "" && $_POST['away'] != "" && $_POST['start_time'] != "") {
    $home = trim($_POST['home']);
    $away = trim($_POST['away']);
    $start_time = trim($_POST['start_time']);
    $bets = "";
    for($i = 0; $i < count($matches[1]); $i++) {
      $bets = sprintf("%s %s - %s ", $bets, $matches[1][$i], $matches[2][$i]);
    }
    trim($bets);
    $query = sprintf("INSERT INTO events (home, away, start_time, bets) VALUES ('%s','%s','%s','%s')", $home, $away, $start_time, $bets);
    mysql_query($query);
    echo '<meta http-equiv="refresh" content="0;URL=../events.php">';
  } else echo '<meta http-equiv="refresh" content="0;URL=../add_event.php">';
?>