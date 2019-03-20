<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="main.css">
  <meta charset="utf-8">
  <title>Данные о пользователях</title>
</head>
<body>
<?php
$db_host = 'localhost';
$db_user = 'almaz';
$db_pass = 'almaz';
$db_nam = 'users';

$db = mysql_connect($db_host, $db_user, $db_pass);

mysql_select_db($db_nam);

?>

<?php
  if (isset($_POST["name"])) {
    $sql = mysql_query("INSERT INTO data (name, sername, date, email) VALUES ( '$_POST[name]', '$_POST[sername]', '$_POST[date]', '$_POST[email]' ) ", $db);

    if ($sql) {

    } else {
      echo '<p>error send: ' . mysql_error($db) . '</p>';
    }
  }
  
  if (isset($_GET['id'])) { 
    $sql2 = mysql_query( "DELETE FROM data WHERE id = '{$_GET['id']}'", $db);
    if ($sql2) {
    } else {
      echo '<p>Error: ' . mysql_error($db) . '</p>';
    }
  }
?>
<form action="" method="post">
  <label>Your name:<br><input type = "text" name = "name"></label><br>
  <label>Your serName:<br><input type = "text" name = "sername"></label><br>
  <label>Your b.date:<br><input type = "date" name = "date"></label><br>
  <label>Your email adress:<br><input type = "email" name = "email"></label><br>
  <input type = "submit" value = "Send">
</form>

<table>
  <tr>
    <th>your name</th>
    <th>sername</th>
    <th>b.date</th>
    <th>email</th>
    <th>del</th>
  </tr>
<?php
$sql1 = mysql_query("SELECT * FROM  data");
while ($result = mysql_fetch_array($sql1)) {
  echo "<tr><td>{$result['name']}</td><td>{$result['sername']}</td><td>{$result['date']}</td><td>{$result['email']}</td><td><a href='?id={$result['id']}'>del</a></td></tr>";
 }
?>
</table>
</body>
</html>