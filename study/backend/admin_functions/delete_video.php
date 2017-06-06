<?php
session_start();
require('../connection/connection.php');
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $video_id = $_GET['video'];
  function delete_video($video_id){
      global $conn;
      $qry = $conn->prepare("DELETE FROM video_tbl where video_ID = $video_id");
      $qry->execute();
  }
  delete_video($video_id);
}
?>
