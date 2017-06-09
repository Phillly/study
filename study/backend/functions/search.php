<?php
session_start();
require('../connection/connection.php');
if(isset($_GET['search'])){
  global $conn;
$search = $_GET['search'];
  $sql = $conn->prepare("SELECT * FROM video_tbl WHERE video_name LIKE '%$search%'");
  $sql->execute();
  $result = $sql->fetchAll();

  echo json_encode($result);


}


?>
