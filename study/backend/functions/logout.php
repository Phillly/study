<?php
session_start();
$_SESSION['state'] = 'guest';
header('Location:http://localhost/study/home.php?logout');
session_destroy();
 ?>
