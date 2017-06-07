<?php
session_start();
  require('../../connection/connection.php');
  require('../get_video.php');
  require('../get_user_details.php');
if(isset($_SESSION['user'])){
  $user_details = $_SESSION['user'];
};
$user = $_SESSION['user']->user_ID;
$user_videos = get_user_video($user);
// $user = $_SESSION['user']->user_ID;
// $user_videos = get_user_video($user);
echo "<div class='profile_page_div'>";
echo "<div class='name_div'>
        <form action='backend/functions/edit_profile.php' method='POST'>
          <label>User name</label>
          <input placeholder='".$user_details->user_name."'name='edit_inputs'>
          <br>
          <input type='submit' name='edit_submit'>
        </form>
      </div>";
echo "<div class='edit_div'>Edit Profile</div>";
echo "<div class='password_div'>Delete Profile</div>";
echo "</div>";
echo "<div>User Videos</div>";
if(isset($_SESSION['state'])){
  if($_SESSION['state'] == 'auth'){
foreach ($user_videos as $row):
  echo "<div class='video_group'>";
    echo "<a  href="."watch.php?video_ID=".$row['video_ID']." class='video_link'><div class='video_image'><img src=view/images/".$row['video_image']." class='thumbnail'></div></a>";
    echo "<div class='video_description'>".ucfirst($row['video_name'])."</div>";
    echo "<div class='video_description' onclick='edit_video()'>Edit Video</div>";
  echo "</div>";
endforeach;
}
}
 ?>
