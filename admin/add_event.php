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
        <div id="title"><? if(isset($_GET['update'])) echo "Обновление события"; else echo "Добавление события";?></div>
        <?
          if ($_GET['error'] == "bets") {
            echo "<div id='error'>Вы неверно ввели данные о ставках</div>";
          }
        ?>
        <?
          if(isset($_GET['update']) && isset($_GET['id'])) {
            $query = sprintf("SELECT * FROM events WHERE id='%s'", $_GET['id']);
            $row = mysql_fetch_array(mysql_query($query));
          }
        ?>
        <form action="blocks/add_event.php" method="post">
          Хозяева: <input type="text" name="home" maxlength="50" <? if(isset($_GET['update'])) echo "value='".$row['home']."'"; ?>>
          Гости: <input type="text" name="away" maxlength="50" <? if(isset($_GET['update'])) echo "value='".$row['away']."'"; ?>><br/>
          Время начала: <input type="datetime-local" name="start_time" <? if(isset($_GET['update'])) echo "value='".date("Y-m-d\TH:i:s", strtotime($row['start_time']))."'"; ?>><br/>
          Исходы. Пример: <br/>П1 - 1.25<br/>П2 - 3.20<br/>ТМ20.5 - 1.65<br/>ТБ20.5 - 2.00<br/>
          <? if(isset($_GET['update'])) echo "<input type='hidden' value='".$_GET['id']."' name='update' >" ?>
          <textarea cols="20" rows="5" name="bets"><? if(isset($_GET['update'])) echo $row['bets']; ?></textarea><br/>
          <input type="submit" value=<? if(isset($_GET['update'])) echo "Обновить"; else echo "Добавить"; ?>>
        </form>
      </div>
    </div>
  </body>
</html>