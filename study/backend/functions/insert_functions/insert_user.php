<?php
function insert_user($user_name,$email,$password_1,$salt){
  global $conn;
  $stmt = $conn->prepare("INSERT INTO user_tbl (user_name , email , password,salt) VALUES (:user_name,:email,:password,:salt)");
  $stmt->bindParam(':user_name', $user_name);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':password', $password_1);
  $stmt->bindParam(':salt', $salt);
  return $stmt;
}
?>
