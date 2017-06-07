<?php
session_start();
require('../../connection/connection.php');
require('../insert_functions/insert_video.php');
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
$uploaddir = 'localhost/study/view/video/';
$uploadfile = $uploaddir . basename($_FILES['video_file']['name']);
if($_FILES['video_file']['size'] < 100000){
if (move_uploaded_file($_FILES['video_file']['tmp_name'], $uploadfile)) {
    echo "File is valid, and was successfully uploaded.\n";
} else {
    echo "Possible file upload attack!\n";
}
}else{
  
}
print_r($_FILES);


 $video_image = $_FILES['video_image']['name'];
 $video_file = $_FILES['video_image']['size'];
 $video_file = $_FILES['video_image']['type'];
 print_r($video_image);
if (($video_image !== IMAGETYPE_GIF) && ($video_image !== IMAGETYPE_JPEG) && ($video_image !== IMAGETYPE_PNG)) {
   $error['image'] = 'true';
}else{}
 // $catergory = $_POST['video_cat'];

;

}

?>
