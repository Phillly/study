<?php
session_start();
require('../connection/connection.php');
require('insert_user.php');
require('get_login.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  global $conn;
 $user_name = $_POST['user_name'];
 $email = $_POST['email'];
 $password_1 = $_POST['password_1'];
 $password_2 = $_POST['password_2'];
$error = [];
$stmt = insert_user($user_name,$email,$password_1);
$check_user = check_if_user_exist($user_name);
$check_email = check_if_email_exist($email);
if($email == "" || $password_1 == "" || $password_2 == "" || $user_name == '' ){
  $error['empty'] = "true";
}
////NO IDE A WHY THIS WONT WORK I HAVE TRIED EVERYTHING
if($check_user == true){
  $error['user_name_exist'] = 'true';
}
if($check_email == true){
  $error['email_exist'] = 'true';
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $error['email_false'] = 'true';
}
if($password_1 !== $password_2){
  $error['fail_pass'] = 'true';
}

if($error == []){
  $error[''] = true;
  $stmt->execute();
  $_SESSION['user'] = 'user';
echo json_encode($error);
}else {
  echo json_encode($error);
}

}



?>
