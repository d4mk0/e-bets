<div id="menu">
  <a href="line.php"><span>Линия</span></a>
  ||<a href="bets.php"><span>История ставок</span></a>
  ||<a href="admin/">Админка</a>
  <? if(isset($_COOKIE['bsecret'])) echo "||<a href=\"auth.php?kill=true\">Выход</a>"; ?>
</div>