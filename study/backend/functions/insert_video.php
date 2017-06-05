<?php
function insert_video($video_name,$video_desc,$video_file,$video_image,$catergory,$user){
  global $conn;

  $sql = $conn->prepare("INSERT INTO video_tbl (video_name,video_desc,video_file,video_image,catergory_ID,user_ID) VALUES (:videoname,:videodesc,:videofile,:videoimage,:catergory,:user)");
  $sql->bindParam(':video_name', $video_name);
  $sql->bindParam(':video_desc', $video_desc);
  $sql->bindParam(':video_file', $video_file);
  $sql->bindParam(':video_image',$video_image );
  $sql->bindParam(':catergory_ID',$catergory );
  $sql->bindParam(':user_ID', $user);
  return $sql;
}
?>
