<div id="header">
  <?
    if(isset($_COOKIE['bsecret'])) {
      include "blocks/connect_db.php";
      $query = sprintf("SELECT login, balance FROM users WHERE secret='%s'", $_COOKIE['bsecret']);
      $result = mysql_query($query);
      if(mysql_num_rows($result) == 0) $auth = false;
      else {
        $auth = true;
        $row = mysql_fetch_array($result);
        echo "<div class=\"text\">Ваш баланс: <strong>".$row['balance']."</strong> руб. Удачных ставок ".$row['login']."!</div>";
      }
    } else {
      echo "<div class=\"autority\"><a href=\"autorization.php\">Авторизируйтесь</a> или <a href=\"register.php\">Зарегистрируйтесь</a></div>";
    }
  ?>
  
  <? include "blocks/menu.php" ?>
  <div id="logo">Evgen BETS</div>
</div>