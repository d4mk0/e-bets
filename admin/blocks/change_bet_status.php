<?
  include "connect_db.php";
  include "check_admin_rules.php";
  if(isset($_GET['status']) && isset($_GET['id'])) {
    $status = trim($_GET['status']);
    if (!($status == "win" || $status == "draw" || $status == "lose")) {
      echo '<meta http-equiv="refresh" content="0;URL=../bets.php">';
    } else {
      $id = trim($_GET['id']);
      $query = sprintf("UPDATE bets SET status='%s' WHERE id='%s'", $status, $id);
      mysql_query($query);
      if($status=="draw" || $status == "win") {
        $query = sprintf("SELECT bets.*, users.balance FROM bets, users WHERE bets.id='%s' AND bets.user_id=users.id", $id);
        $row = mysql_fetch_array(mysql_query($query));
        if($status == "draw") $k = 1;
        else $k = $row['coeff'];
        $query = sprintf("UPDATE users SET balance='%s' WHERE id='%s'", $row['balance']+$k*$row['amount'], $row['user_id']);
        mysql_query($query);
      }
      echo '<meta http-equiv="refresh" content="0;URL=../bets.php">';
    }
  } else echo '<meta http-equiv="refresh" content="0;URL=../bets.php">';
?>