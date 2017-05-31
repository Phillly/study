<?php
function find_user($search_user){
  global $conn;
$sql = $conn->prepare("SELECT * FROM user_tbl WHERE user_name LIKE '%$search_user%'");
$sql->execute();
$result = $sql->fetchAll();
return $result;
}
function user_prof($user_desc){
global $conn;
$sql = $conn->prepare("SELECT * FROM user_tbl WHERE user_name = '$user_desc'");
$sql->execute();
$result = $sql->fetchAll();
return $result;
}
?>
