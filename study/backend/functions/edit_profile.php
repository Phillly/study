<?php
session_start();
include('../connection/connection.php');
if(isset($_SESSION['user'])){
  $user_details = $_SESSION['user'];
$user = $user_details->user_ID;
};
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user_name = $_POST['edit_name'];
  global $conn;
  $sql = $conn->prepare("UPDATE user_tbl SET user_name = '$user_name' WHERE user_ID = '$user'");
  $sql->execute();
// if(!empty($user_name)){$user_name}
}
?>
