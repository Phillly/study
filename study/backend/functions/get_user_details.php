<?php
function get_admin_details($user){
global $conn;
$video = $conn->prepare("SELECT * FROM user_tbl where is_admin = :user");
$video->bindParam(":user", $user);
$video->execute();
if($video->rowCount() == 0){
  return false;
}else{
  return true;
}
}
//function getvideos_limited(){
//  global $conn;
//$video = $conn->prepare("SELECT * FROM video_tbl ORDER BY RAND() limit 3");
//$video->execute();
//$result = $video->fetchAll();
//return $result;
//}
?>
