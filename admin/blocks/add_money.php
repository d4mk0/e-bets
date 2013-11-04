<?
  include "../../blocks/connect_db.php";
  include "check_admin_rules.php";
  if(isset($_POST['uid']) && isset($_POST['sum'])) {
    $uid = trim($_POST['uid']);
    $sum = trim($_POST['sum']);
    $query = sprintf("SELECT balance FROM users WHERE id='%s'", $uid);
    $row = mysql_fetch_array(mysql_query($query));
    $new_balance = $row['balance']+$sum;
    $query = sprintf("UPDATE users SET balance='%s' WHERE id='%s'", $new_balance, $uid);
    mysql_query($query);
    echo '<meta http-equiv="refresh" content="0;URL=../give_money.php?uid='.$uid.'">';
  } else echo '<meta http-equiv="refresh" content="0;URL=../index.php">';
?>