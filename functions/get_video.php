<?php
function get_video_count(){
  global $conn;
      $result = $conn->prepare("SELECT COUNT(video_ID) from video_tbl");
      $result->execute();
      $count = $result->fetchColumn(0);
      return $count;
}
///////
function getvideos($items_per_page = null, $offset = 0){
  global $conn;
$video = "SELECT * FROM video_tbl limit $items_per_page offset $offset";
if(is_integer($items_per_page)){
$results = $conn->prepare($video);
}else{
  $results = $conn->prepare($video);
}
$results->execute();
return $results;
}

function get_video_details($user_ID){
  global $conn;
  $qry = $conn->prepare("SELECT * FROM user_tbl where user_ID = :user_id");
  $qry->bindParam(':user_id', $user_ID);
  $qry->execute();
  $details = $qry->fetch(PDO::FETCH_OBJ);
  return $details;

}




function get_video_ID($video){
  global $conn;
  $get_ID_video = $conn->prepare("SELECT * FROM video_tbl where video_ID = '$video'");
  $get_ID_video->execute();
  $row = $get_ID_video->fetch(PDO::FETCH_OBJ);
  return $row;
}
function get_user_video($user){
  global $conn;
  $get_ID_video = $conn->prepare("SELECT * FROM video_tbl where user_ID = :user");
  $get_ID_video->bindValue(':user', $user);
  $get_ID_video->execute();
  $row = $get_ID_video->fetchAll();
  return $row;
}
function get_edit_video($video){
  global $conn;
  $get_ID_video = $conn->prepare("SELECT * FROM video_tbl where video_ID = '$video'");
  $get_ID_video->execute();
  $row = $get_ID_video->fetch(PDO::FETCH_OBJ);
  return $row;
}
?>
