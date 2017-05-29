<?php
function add_view($video){
  global $conn;
$sql = $conn->prepare("UPDATE video_tbl SET views = (views + 1)
      WHERE video_ID='$video'");
      $sql->execute();
    }
?>
