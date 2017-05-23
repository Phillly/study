<?php
function search_video($search){
  global $conn;
$sql = $conn->prepare("SELECT * FROM video_tbl WHERE video_image LIKE '%$search%'");
$sql->execute();
$result = $sql->fetchAll();
return $result;
}
?>
