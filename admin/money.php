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
        <div id="title">Деньги пользователей</div>
        
        <table id="money">
          <thead>
            <th>Id</th>
            <th>Login</th>
            <th>Balance</th>
          </thead>
          <?
            $query = sprintf("SELECT * FROM users");
            $result = mysql_query($query);
            while ($row = mysql_fetch_array($result)) {
              printf("
              <tr><td>%s</td><td>%s</td><td>%s</td><td><a href=\"give_money.php?uid=%s\">Изменить баланс</a></td></tr>
              ", $row['id'], $row['login'], $row['balance'], $row['id']);
            }
          ?>
        </table>
      </div>
    </div>
  </body>
</html>