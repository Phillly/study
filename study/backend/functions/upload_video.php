<?php
session_start();
require('../connection/connection.php');
require('insert_video.php');
require('Get_functions/get_catergorys.php');
if(isset($_SESSION['user'])){
  $user_details = $_SESSION['user'];
};

$user = $user_details->user_ID;
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $errors = [];
    $video_desc = $_POST['video_description'];
    $video_name = $_POST['video_name'];
    $randomDig = rand(0000,9999);
 if($video_desc == "" || $video_name == ""){
   $errors .= '&&input_fields=true&&';
 }else{
 }
 // Catergory input
 $cat_post = $_POST['video_cat'];
 $cat = get_catergory($cat_post);
 $catergory = $cat['catergory_ID'];
 // Video input
 if(!empty($_FILES['video_file']['name'])){
 $allowed_video_types= array('mp4', 'mp3');
 $upload_video_dir = '/xampp/htdocs/study/view/video/';
 $video_file_name = $_FILES['video_file']['name'];
 $upload_video = basename($randomDig . "_" . $video_file_name);
 $video_target = $upload_video_dir . $upload_video;
 $rem = explode('.', $_FILES['video_file']['name']);
 $ebd = end($rem);
 if(($_FILES['video_file']['type'] == 'video/mp3') || ($_FILES['video_file']['type'] == 'video/mp4') && in_array($ebd, $allowed_video_types)){
   move_uploaded_file($_FILES['video_file']['tmp_name'], $video_target);
 }else{
   $errors .= 'wrong_video=true&&';
 }
 }else{
   $errors .= 'empty_video=true&&';
 }
 // Image input
 if(!empty($_FILES['video_image']['name'])){
$allowedtyps= array('jpg', 'jpeg', 'gif', 'png');
$uploadfile = $_FILES['video_image']['name'];
$upload_image = basename($randomDig . "_" . $uploadfile);
$uploaddir = '/xampp/htdocs/study/view/images/';
$target = $uploaddir . $upload_image;
$remove = explode('.', $_FILES['video_image']['name']);
$extension = end($remove);
 if(($_FILES['video_image']['type'] == 'image/jpg') || ($_FILES['video_image']['type'] == 'image/jpeg') || ($_FILES['video_image']['type'] == 'image/gif')
 || ($_FILES['video_image']['type'] == 'image/png') && in_array($extension, $allowedtyps)){
			move_uploaded_file($_FILES['video_image']['tmp_name'], $target);
		}else{
      $errors .= 'wrong_image=true&&';
    }
 }else{
    $errors .= 'empty_image=true';
 }
// Check for errors
   if(!empty($errors)){
     header('Location:http://localhost/study/upload.php?'.$errors.'');
 }else{
    $sql = insert_video($video_name,$video_desc,$upload_video,$upload_image,$catergory,$user);
    header('Location:http://localhost/study/home.php?uploaded=true');
 }
}

?>
