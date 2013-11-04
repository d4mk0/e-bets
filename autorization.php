<? include "blocks/connect_db.php" ?>
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
        Авторизация
        <form action="auth.php" method="post">
          Ваш логин:<input type="text" name="login" maxlength="50">
          Ваш пароль:<input type="password" name="password" maxlength="50">
          <input type="submit" value="Войти">
        </form>
      </div>
      <? include "blocks/footer.php" ?>
    </div>
  </body>
</html>