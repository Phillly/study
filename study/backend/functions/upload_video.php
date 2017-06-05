<?php
session_start();
require('../connection/connection.php');
require('insert_video.php');
if(isset($_SESSION['user'])){
  $user_details = $_SESSION['user'];
};
$user = $user_details->user_ID;
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $error = [];
//  $sql = insert_video($video_name,$video_desc,$video_file,$video_image,$catergory,$user);
 $video_name = $_POST['video_name'];
 if($video_name == ""){
   $error['video_name'] = 'true';
 }
 $video_desc = $_POST['video_description'];
 if($video_desc == ""){
   $error['video_desc'] = 'true';
 }

 $video_file = $_FILES['video_file']['size'];
 print_r($video_file);
 if($video_file != 'video/mp4'){
   echo 'didnt work';
 }else{
    print_r($video_file);
 }

// $video_image = $_POST['video_image'];
if (($video_image !== IMAGETYPE_GIF) && ($video_image !== IMAGETYPE_JPEG) && ($video_image !== IMAGETYPE_PNG)) {
   $error['image'] = 'true';
}
print_r($video_image);
 $catergory = $_POST['video_cat'];

;

}

?>
