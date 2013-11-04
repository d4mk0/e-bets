<? include "blocks/connect_db.php" ?>
<script>
  <? if(isset($_GET['registered'])) echo "alert(\"Вы зарегистрировались!\");"; ?>
  if(window.location.search == "?registered=true") {window.location.search = "";}
</script>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/><!--Установка кодировки страницы-->
    <link rel='stylesheet' href="assets/styles/application.css" type='text/css'><!--Подключение теблицы стилей-->
    <title>E-bets. Ставки у Евгена</title>
  </head>
  <body>
    <div id="base_block">
      <? include "blocks/header.php" ?>
      <div id="content">
        Это главная страница сайта ставок у Евгена.<br>
        На сайте вы можете сделать ставки на различные события в разделе <a href="line.php" target="_blank">Линия</a>
      </div>
      <? include "blocks/footer.php" ?>
    </div>
  </body>
</html>