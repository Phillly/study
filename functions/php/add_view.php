<?php
session_start();
require('../functions/connection.php');
//  require('../functions/insert_user.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  function add_view(){
    global $conn;
  $video = $conn->prepare("SELECT * FROM video_tbl");
  $video->execute();
  $result = $video->fetchAll();
  $update_view = $conn->prepare("UPDATE video_tbl set views 2 WHERE video_ID = 2");
  $update_view->execute();
  }
  return add_view();
}



?>
