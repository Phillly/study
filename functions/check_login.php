<?php
session_start();
require('../connection/connection.php');
require('get_login.php');
if($_SERVER["REQUEST_METHOD"] == "POST") {
  global $conn;
  $user_name = $_POST['user_name_login'];
  $password = $_POST['password_1_login'];
$check_login = check_login($user_name, $password);
$error_login = [];
if(empty($user_name || $password)){
  $error_login['empty'] = 'true';
}
if($check_login == true){
}else{
    $error_login['wrong_false'] = 'true';
}
if($error_login == []){
  $error_login['user_logged'] = true;
  $_SESSION['user'] = $check_login;
  echo json_encode($error_login);
}else{
  echo json_encode($error_login);
}
}



?>
