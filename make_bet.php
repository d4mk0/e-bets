<? include "blocks/connect_db.php";
  if (!(isset($_GET['event_id']) && isset($_GET['coeff']) && isset($_GET['choose']))) {
    echo '<meta http-equiv="refresh" content="0;URL=line.php">';
  }
  if(isset($_COOKIE['bsecret'])) {
      $query = sprintf("SELECT login, balance FROM users WHERE secret='%s'", $_COOKIE['bsecret']);
      $result = mysql_query($query);
      if(mysql_num_rows($result) == 0) echo '<meta http-equiv="refresh" content="0;URL=index.php">';
  } else echo '<meta http-equiv="refresh" content="0;URL=index.php">';
  $query = sprintf("SELECT * FROM events WHERE id='%s'", $_GET['event_id']);
  $result = mysql_query($query);
  if(mysql_num_rows($result) == 0) echo '<meta http-equiv="refresh" content="0;URL=index.php">';
  $row1 = mysql_fetch_array($result);
  $exp = sprintf("%s - %s", $_GET['choose'], $_GET['coeff']);
  if (!stripos($row1['bets'], $exp)) echo '<meta http-equiv="refresh" content="0;URL=line.php">';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/><!--Установка кодировки страницы-->
    <link rel='stylesheet' href="assets/styles/application.css" type='text/css'><!--Подключение теблицы стилей-->
    <title>Линия | E-bets. Ставки у Евгена</title>
    <script>
      function possible_win_change(coeff) {
        var el = document.getElementById('possible_win');
        var sum = document.getElementById('amount')
        el.innerHTML = parseInt(parseInt(sum.value) * coeff);
      }
    </script>
  </head>
  <body>
    <div id="base_block">
      <? include "blocks/header.php" ?>
      <div id="content">
        Вы находитесь на странице подтверждения ставки:
        <form action="blocks/add_bet.php" method="post">
          <?
            printf("Вы делаете ставку на событие <span class='versuses'>%s - %s</span>.<br/>
            Ваш исход: <span class='choose'>%s</span>. Коэффициент: <span class='coeff'>%s</span>", $row1['home'], $row1['away'], $_GET['choose'], $_GET['coeff']);
          ?>
          Сумма ставки: <input type='text' name='amount' id='amount' onchange='' onkeyup='(this.value=parseInt(this.value) | 0) && possible_win_change(<? echo $_GET['coeff'] ?>)'><br/>
          Возможный выигрыш: <span id='possible_win'>0</span><br/>
          <input type='submit' value='Принять ставку'>
        </form>
      </div>
      <? include "blocks/footer.php" ?>
    </div>
  </body>
</html>