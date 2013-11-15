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
        <div id="title">Ставки</div>
        <table id="events">
          <thead>
            <th>Пользователь</th>
            <th>Исход</th>
            <th>Выбор - коэффициент</th>
            <th>Сумма ставки</th>
            <th>Результат</th>
            <th>Время ставки</th>
          </thead>
          <?
            function statuses($status, $id) {
              if($status == "not_calculated")
              return "<a href='blocks/change_bet_status.php?status=win&id=".$id."'>Выгрыш</a>
              <a href='blocks/change_bet_status.php?status=lose&id=".$id."'>Проигрыш</a>
              <a href='blocks/change_bet_status.php?status=draw&id=".$id."'>Возврат</a>";
            }
            $query = sprintf("SELECT bets.*, (users.login), events.home,away FROM bets,users,events WHERE bets.user_id=users.id AND bets.event_id=events.id");
            $result = mysql_query($query);
            while ($row = mysql_fetch_array($result)) {
              printf("
              <tr><td>%s</td><td>%s - %s</td><td>%s - %s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>
              ", $row['login'], $row['home'], $row['away'], $row['choose'], $row['coeff'], $row['amount'], $row['status'], date("d/m/y H:i", strtotime($row['created_at'])), statuses($row['status'], $row['id']));
            }
          ?>
        </table>
      </div>
    </div>
  </body>
</html>