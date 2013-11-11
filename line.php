<? include "blocks/connect_db.php" ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/><!--Установка кодировки страницы-->
    <link rel='stylesheet' href="assets/styles/application.css" type='text/css'><!--Подключение теблицы стилей-->
    <title>Линия | E-bets. Ставки у Евгена</title>
  </head>
  <body>
    <div id="base_block">
      <? include "blocks/header.php" ?>
      <div id="content">
        Вы находитесь в разделе "Линия". Здесь вы можете выбрать интересующие вас события и сделать на них ставки.
        <div id="line_block">
        <?
          $query = sprintf("SELECT * FROM events WHERE start_time >= NOW() ORDER BY start_time");
          $result = mysql_query($query);
          while($row = mysql_fetch_array($result)) {
            preg_match_all('/(.{2,12}) - (\d\.\d{2})/', $row['bets'], $matches);
            printf("
              <table id='line'>
                <tr class='line_header'>
                  <td>%s</td><td class='teams'>%s - %s</td>
                </tr>
                <tr>
                  <td colspan='3' class='bets'>", date("d/m H:i", strtotime($row['start_time'])), $row['home'], $row['away'], $bets);
            for($i = 0; $i < count($matches[1]); $i++) {
              echo sprintf("<a href='make_bet.php?event_id=%s&coeff=%s&choose=%s' class='bet'>%s - %s</a>", $row['id'], $matches[2][$i], trim($matches[1][$i]), $matches[1][$i], $matches[2][$i]);
            }
            printf("</td>
                </tr>
              </table>");
            
          }
        ?>
        </div>
      </div>
      <? include "blocks/footer.php" ?>
    </div>
  </body>
</html>