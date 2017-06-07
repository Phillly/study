<?php
session_start();
if(isset($_SESSION['user'])){
  $user_details = $_SESSION['user'];
  $_SESSION['state'] = 'auth';
   header('Location:http://localhost/study/home.php?user=user');
}
//echo $user_details["user_name"];
//$_SESSION['user'] = 'user';
?>
