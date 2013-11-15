<?
  include "blocks/connect_db.php";
  if(isset($_COOKIE['bsecret'])) {
      $query = sprintf("SELECT id, login, balance FROM users WHERE secret='%s'", $_COOKIE['bsecret']);
      $result = mysql_query($query);
      if(mysql_num_rows($result) == 0) echo '<meta http-equiv="refresh" content="0;URL=../index.php">';
      else $user = mysql_fetch_array($result);
    } else echo '<meta http-equiv="refresh" content="0;URL=index.php">';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/><!--Установка кодировки страницы-->
    <link rel='stylesheet' href="assets/styles/application.css" type='text/css'><!--Подключение теблицы стилей-->
    <title>История ставок | E-bets. Ставки у Евгена</title>
  </head>
  <body>
    <div id="base_block">
      <? include "blocks/header.php" ?>
      <div id="content">
        Вы находитесь в разделе "История ставок". Здесь вы можете просмотреть сделанные ставки.
        <div id="bets_history">
        <?
          function current_status($status) {
            if($status=="not_calculated") return "<span class='not_calc'>Не рассчитана</span>";
            if($status=="lose") return "<span class='lose'>Проигрыш</span>";
            if($status=="win") return "<span class='win'>Выигрыш</span>";
            if($status=="draw") return "<span class='draw'>Возврат</span>";
          }
          $query = sprintf("SELECT * FROM bets, events WHERE bets.event_id=events.id AND bets.user_id='%s'", $user['id']);
          $result = mysql_query($query);
          while($row = mysql_fetch_array($result)) {
            printf("
              <div class='bet'>
                <div class ='versuses'>%s - %s</div>
                <div class='choose'>%s - Коэффициент: %s</div>
                <div class='amount'>Сумма ставки: %s</div>
                <div class='calc'>Статус: %s</div>
              </div>", $row['home'], $row['away'], $row['choose'], $row['coeff'], $row['amount'], current_status($row['status']));
           
          }
        ?>
        </div>
      </div>
      <? include "blocks/footer.php" ?>
    </div>
  </body>
</html>