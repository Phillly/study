<?php
session_start();
if(isset($_SESSION['user'])){
  $user_details = $_SESSION['user'];
    $user_admin = $user_details->is_admin;
};
require('../../connection/connection.php');
require('../Get_functions/get_video.php');
require('../../admin_functions/view_users.php');
if(isset($_SESSION['user'])){
  if($user_admin === 1){
    $view_users = view_users();
    echo "<form id='form_select_user' method='post' action='#'><select id='select_user'>";
    foreach ($view_users as $key) {
      echo "<option value='".$key['user_ID']."' class='delete_user' name='".$key['user_name']."'>".ucfirst($key['user_name'])."</option>";
    }
    echo "</select><input type='submit' value='delete'/></form>";
  }else{
  if($_SESSION['state'] == 'auth'){
echo "<div class='user_name_style' onclick='load_profile()'>".ucfirst($user_details->user_name)."</div>";
  echo "<div class='user_name_style'><a href='upload.php'>Upload video</a></div>";
  echo "<div class='user_name_style' onclick='load_edit_page()'><a>View profile</a></div>";
  echo "<div class='user_name_style' onclick='load_edit_page()'><a>Uploaded videos</a></div>";
}
}
}else{
echo "<div class='user_name_style'><span>Not logged in</span>";
echo "<br>";
echo "<span class='span_log'>login in here !</span></div>";
}
?>
