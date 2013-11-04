<? include "../blocks/connect_db.php" ?>
<? include "blocks/check_admin_rules.php" ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/><!--Установка кодировки страницы-->
    <link rel='stylesheet' href="../assets/styles/admin.css" type='text/css'><!--Подключение теблицы стилей-->
    <title>E-bets. Ставки у Евгена</title>
  </head>
  <body>
    <div id="base_block">
      <? include "blocks/menu.php" ?>
      <div id="content">
        События
        <table id="events">
          <thead>
            <th>Id</th>
            <th>Хозяева</th>
            <th>Гости</th>
            <th>Время начала</th>
          </thead>
          <?
            $query = sprintf("SELECT * FROM events");
            $result = mysql_query($query);
            while ($row = mysql_fetch_array($result)) {
              printf("
              <tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>
              ", $row['id'], $row['home'], $row['away'], date("d/m/y H:i", $row['start_time']));
            }
          ?>
        </table>
      </div>
    </div>
  </body>
</html>