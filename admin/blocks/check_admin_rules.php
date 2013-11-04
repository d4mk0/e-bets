<?
  function access_denied() { echo "Access denied"; exit(); }
  include "connect_db.php";
  if(isset($_COOKIE['bsecret'])) {
    $query = sprintf("SELECT login, admin_rules FROM users WHERE secret='%s'", $_COOKIE['bsecret']);
    $result = mysql_query($query);
    if(mysql_num_rows($result) == 0) access_denied();
    $row = mysql_fetch_array($result);
    if($row['admin_rules'] != '1') access_denied();
  } else access_denied();
?>