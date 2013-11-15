<?
  include "connect_db.php";
  
  if(isset($_POST['event_id']) && isset($_POST['coeff']) && isset($_POST['choose']) && isset($_POST['amount'])) {
    if(isset($_COOKIE['bsecret'])) {
      $query = sprintf("SELECT id, login, balance FROM users WHERE secret='%s'", $_COOKIE['bsecret']);
      $result = mysql_query($query);
      if(mysql_num_rows($result) == 0) echo '<meta http-equiv="refresh" content="0;URL=../index.php">';
      else $user = mysql_fetch_array($result);
    } else echo '<meta http-equiv="refresh" content="0;URL=../index.php">';
    $event_id = trim($_POST['event_id']);
    $coeff = trim($_POST['coeff']);
    $choose = trim($_POST['choose']);
    $amount = trim($_POST['amount']);
    $query = sprintf("SELECT * FROM events WHERE id='%s'", $event_id);
    $result = mysql_query($query);
    if(mysql_num_rows($result) == 0) echo '<meta http-equiv="refresh" content="0;URL=../index.php">';
    else {
      $row1 = mysql_fetch_array($result);
      $exp = sprintf("%s - %s", $choose, $coeff);
      if (!stripos($row1['bets'], $exp)) echo '<meta http-equiv="refresh" content="0;URL=../line.php">';
      else {
        
        if($user['balance'] < $amount) {
          printf("<script>alert('Сумма ставки больше вашего баланса');</script>
          <meta http-equiv=\"refresh\" content=\"0;URL=../make_bet.php?event_id=%s&coeff=%s&choose=%s\">", $event_id, $coeff, $choose);
        } else {
          if($amount <= 0) {
            printf("<script>alert('Введите сумму ставки');</script>
          <meta http-equiv=\"refresh\" content=\"0;URL=../make_bet.php?event_id=%s&coeff=%s&choose=%s\">", $event_id, $coeff, $choose);
          } else {
            $query = sprintf("UPDATE users SET balance='%s' WHERE id='%s'", $user['balance']-$amount, $user['id']);
            mysql_query($query);
            $query = sprintf("INSERT INTO bets (user_id, event_id, amount, coeff, choose) VALUES ('%s','%s','%s','%s','%s')", $user['id'], $event_id, $amount, $coeff, $choose);
            mysql_query($query);
            echo "<script>alert('Ставка принята');</script><meta http-equiv=\"refresh\" content=\"0;URL=../line.php\">";
          }
        }
      }
    }
  } else echo "<meta http-equiv=\"refresh\" content=\"0;URL=line.php\">";
?>