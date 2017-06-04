<?php
session_start();
require('../connection/connection.php');
require('insert_video.php');
if(isset($_SESSION['user'])){
  $user_details = $_SESSION['user'];
};
$user = $user_details->user_ID;
if ($_SERVER["REQUEST_METHOD"] == "POST"){
 $sql = insert_video($video_name,$video_desc,$video_file,$video_image,$catergory,$user);
$video_name = $_POST['video_name'];
$video_desc = $_POST['video_description'];
$video_file = $_POST['video_file'];
$video_image = $_POST['video_image'];
$catergory = $_POST['video_cat'];
$user = $user_details->user_ID;
print_r($catergory);
}

?>
