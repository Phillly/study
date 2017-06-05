<?php
session_start();
  require('../get_video.php');
  require('../../connection/connection.php');
if(isset($_SESSION['user'])){
  $user_details = $_SESSION['user'];
  $user = $_SESSION['user']->user_ID;
};

  $user_videos = get_user_video($user);
if(isset($_GET['edit'])){
  echo "<div class='edit_profile_div'>
  <form class='edit_profile'>
    <label>Edit user name</label>
      <input name='edit_name'></input>
    <label>Edit Email</label>
      <input name='edit_email'></input>
    <label></label>
    <div>edit_password</div>
  </form>
  </div>";
}else{
if(isset($_GET['profile']) && isset($_GET['video'])){

}else{
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
        echo "<div class='user_videos'> ";
}
}
  if($_SESSION['state'] == 'auth'){
    /////////////   EDIT VIDEO
    if(isset($_GET['profile']) && isset($_GET['video'])){
      $edit_video = get_edit_video($_GET['video']);
        echo "<div class='video_group_profile_editing'>";
                  echo "<a  href="."watch.php?video_ID=".$edit_video->video_ID." class='video_link''>
                          <div class='video_image'><img src=view/".$edit_video->video_image." class='thumbnail'></div>
                        </a>";
                  echo "<div class='video_description'><input placeholder='".ucfirst($edit_video->video_name)."'></input></div>";
        echo "</div>";
        echo "<div class='edit_video_form'>
        <form>
        <label>video name</label>
        <br>
        <input>video desc</input>
        <label></label>
        <br>
        <input>video image</input>
        <label></label>
        <br>
        <input></input>
        </form>
        </div>";
    }else{
      /////// If edit link is clicked from home page edit the GET gets set
      if(isset($_GET['edit'])){

      }else{
foreach ($user_videos as $row):
  echo "<div class='video_group_profile'>";
    echo "<a  href="."watch.php?video_ID=".$row['video_ID']." class='video_link'><div class='video_image'><img src=view/".$row['video_image']." class='thumbnail'></div></a>";
    echo "<div class='video_description'>".ucfirst($row['video_name'])."</div>";
    echo "<div class='video_description' onclick='edit_video()'><a href='home.php?profile=".$user."&video=".$row['video_ID']."'>Edit Video</a></div>";
  echo "</div>";
endforeach;
}
///end of edit else
}
//end of edit video else
}
// end of if state == auth
echo "</div>";
?>
