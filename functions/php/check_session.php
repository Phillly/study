<?php
session_start();
if($_SESSION['user'] == 'user'){
   header('Location:http://localhost/study/home.php');
}else{
   header('Location:http://localhost/study/ajax.html?error=securepage');
}
 ?>
