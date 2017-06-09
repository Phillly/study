<?php
function get_popular(){
  global $conn;
  $get_pop_video = $conn->prepare("SELECT * FROM video_tbl ORDER by views DESC");
  $get_pop_video->execute();
  $row = $get_pop_video->fetchAll();
  return $row;
}

?>
