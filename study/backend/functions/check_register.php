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
$check_user = check_if_user_exist($user_name, $email);
if($email == "" || $password_1 == "" || $password_2 == "" || $user_name == '' ){
  $error['empty'] = "true";
}
if($check_user->rowcount() = 1){
  $error['user_name_exist'] = true;
})
if ($user_name == ""){
      $error['f_user_name'] = 'true';
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
