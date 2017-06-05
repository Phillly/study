<?php
session_start();
include('../connection/connection.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user_name = $_POST['edit_inputs'];
  global $conn;
  $sql = $conn->prepare("UPDATE `user_tbl` SET `user_name` = 'updated' WHERE `user_tbl`.`user_ID` = 61");
$sql->execute();
// if(!empty($user_name)){$user_name}
}
?>
