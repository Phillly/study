<?php
function search_video($search){
  global $conn;
$sql = $conn->prepare("SELECT * FROM video_tbl WHERE video_name LIKE '%$search%'");
$sql->execute();
$result = $sql->fetchAll();
if(empty($result)){
  $sql = $conn->prepare("SELECT * FROM video_tbl WHERE video_name LIKE '%$search'");
  $sql->execute();
  $result = $sql->fetchAll();
  return $result;
}else{
return $result;
}
}
?>
