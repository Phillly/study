<?php
function get_video_ID($video){
  global $conn;
  $get_ID_video = $conn->prepare("SELECT * FROM video_tbl where video_ID = $video");
  $get_ID_video->execute();
  $row = $get_ID_video->fetch(PDO::FETCH_OBJ);
  return $row;
}

?>
