<?php
function insert_video($video_name,$video_desc,$upload_video,$upload_image,$catergory,$user){
  global $conn;

  $sql = $conn->prepare("INSERT INTO video_tbl (video_name,video_desc,video_file,video_image,catergory_ID,user_ID) VALUES (:videoname,:videodesc,:videofile,:videoimage,:catergory,:user)");
  $sql->bindParam(':videoname', $video_name);
  $sql->bindParam(':videodesc', $video_desc);
  $sql->bindParam(':videofile', $upload_video);
  $sql->bindParam(':videoimage',$upload_image );
  $sql->bindParam(':catergory',$catergory);
  $sql->bindParam(':user', $user);
  $sql->execute();
}
?>
