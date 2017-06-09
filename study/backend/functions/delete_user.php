<?php
session_start();
require('../connection/connection.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  global $conn;
  $user = $_POST['user'];
    $sql ="DELETE FROM user_tbl WHERE user_ID = '$user'";
    $conn->exec($sql);
  echo $user;
}
?>
