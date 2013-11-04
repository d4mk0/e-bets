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
        Добавление события
        <form action="blocks/add_event.php" method="post">
          Хозяева: <input type="text" name="home" maxlength="50">
          Гости: <input type="text" name="away" maxlength="50"><br/>
          Время начала: <input type="datetime-local" name="start_time">
          <input type="submit" value="Добавить">
        </form>
      </div>
    </div>
  </body>
</html>