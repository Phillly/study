<?php
if(isset($_SESSION['user'])){
  $user_details = $_SESSION['user'];
$user = $user_details->user_name;
};
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
