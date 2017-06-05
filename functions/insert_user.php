<?php
function insert_user($user_name,$email,$password_1){
  global $conn;
  $stmt = $conn->prepare("INSERT INTO user_tbl (user_name , email , password) VALUES (:user_name,:email,:password)");
  $stmt->bindParam(':user_name', $user_name);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':password', $password_1);
  return $stmt;
}
?>
