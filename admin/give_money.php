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
        <?
          if(isset($_GET['uid'])) {
            $query = sprintf("SELECT * FROM users WHERE id='%s'", $_GET['uid']);
            $result = mysql_query($query);
            if(mysql_num_rows($result) == 0) echo "Некорректный id пользователя";
            else {
              $row = mysql_fetch_array($result);
              echo "Добавление денег пользователю ".$row['login'];
              printf("
              <form action=\"blocks/add_money.php\" method=\"post\">
                Текущая сумма: <strong>%s</strong>&nbsp;
                Сумма пополнения: <input type=\"text\" name=\"sum\" maxlength=\"50\">
                <input type=\"hidden\" name=\"uid\" value=\"%s\">
                <input type=\"submit\" value=\"Добавить\">
              </form>
              ", $row['balance'], $row['id']);
            }
          } else echo "Некорректный id пользователя";
          
        ?>
      </div>
    </div>
  </body>
</html>