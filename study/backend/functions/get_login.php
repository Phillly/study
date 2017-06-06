<?php
function check_login($user_name, $password){
  global $conn;
$check_log = $conn->prepare("SELECT * FROM user_tbl WHERE user_name = :username AND password = :password");
$check_log->bindParam(":username", $user_name);
$check_log->bindParam(":password", $password);
$check_log->execute();
$row = $check_log->fetch(PDO::FETCH_OBJ);
return $row;
}
function get_user(){
  global $conn;
$check_log = $conn->prepare("SELECT * FROM user_tbl WHERE user_name = " . $_GET['user'] . "");
//$check_log->bindParam(":username", $_GET['user']);
$check_log->execute();
$row = $check_log->fetch(PDO::FETCH_OBJ);
return $row;
}

function check_if_user_exist($user_name){
  global $conn;
$check_log = $conn->prepare("SELECT * FROM user_tbl WHERE user_name = :username");
$check_log->bindParam(":username", $user_name);
$check_log->execute();
$row = $check_log->fetch(PDO::FETCH_OBJ);
return $row;
}
function check_if_email_exist($email){
  global $conn;
$check_log = $conn->prepare("SELECT * FROM user_tbl WHERE email = :email");
$check_log->bindParam(":email", $email);
$check_log->execute();
$row = $check_log->fetch(PDO::FETCH_OBJ);
return $row;
}
// global $conn;
// $check_log = $conn->prepare("SELECT * FROM user_tbl WHERE user_name LIKE '$user_name'");
// //  $check_log->bindParam(":username", 'silence');
// $check_log->execute();
// $yes = $check_log->fetch(PDO::FETCH_OBJ);
// echo $yes->user_name.' '.$yes->email;

 ?>
