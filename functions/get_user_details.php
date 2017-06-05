<?php
function get_user_details(){
  global $conn;
$video = $conn->prepare("SELECT * FROM user_tbl order by rand() limit 1");
$video->execute();
$result = $video->fetchAll();
return $result;
}
//function getvideos_limited(){
//  global $conn;
//$video = $conn->prepare("SELECT * FROM video_tbl ORDER BY RAND() limit 3");
//$video->execute();
//$result = $video->fetchAll();
//return $result;
//}
?>
