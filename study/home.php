<?php
session_start();
  require('backend/connection/connection.php');
  require('backend/functions/Get_functions/get_video.php');
  require('backend/search.php');
  require('backend/admin_functions/view_users.php');
 $get_vid_count = get_video_count();
 $items_per_page = 7;
 $total_pages = ceil($get_vid_count / $items_per_page);

///i havent quite finished the pagination
 if(isset($_GET['pg'])){
   $page_number = filter_input(INPUT_GET,"pg",FILTER_SANITIZE_NUMBER_INT);
 }
  if(empty($page_number)){
    $page_number = 1;
  }

  if($page_number > $total_pages){
    header("location:home.php?pg=".$total_pages);
  }
  if($page_number < 1){
    header("location:home.php?pg=1");

  }
  $offset = ($page_number - 1) * $items_per_page;


  $videos = getvideos($items_per_page, $offset);
?>
<?php

if(!isset($_SESSION['state'])){
  $_SESSION['state'] = 'guest';
};
if(isset($_SESSION['user'])){
  $user_details = $_SESSION['user'];
    $user_admin = $user_details->is_admin;
};
if(isset($_GET['search_bar'])){
  $search = $_GET['search_bar'];
  $search_results = search_video($search);
}else{}
?>
<html>

   <head>
     <meta charset="utf-8">
     <title>home</title>
     <meta name="viewport" content="width=device-width"/>
     <link href="view/STYLES/css/guest.css" rel="stylesheet" type="text/css">
     <link href="view/lightbox/css/lightbox.css" rel="stylesheet" type="text/css">
     <script type="text/javascript" src="view/STYLES/javascript/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="view/STYLES/javascript/ajax.js"></script>
    <noscript>
        <style type="text/css">
            .body_wrapper{
              display:none;
            }
            .noscriptmsg{
              display: block;
            }
        </style>
        <div class="noscriptmsg">
        You don't have javascript enabled.  Good luck with that.
        </div>
    </noscript>
    <body>
   <div id="document_container">
    <nav>
       <div id="menu">&#9776;</div>
       <ul id="main_ul">
        <li class="li_item"><a href="home.php">HOME</a></li>
        <li class="li_item"><a href="popular_videos.php">Popular Videos</a></li>
        <li class="li_item"><a href="discover_videos.php">Discover Videos</a></li>
        <li class="li_item"><a href="friends.php">Friends</a></li>
      </ul>
      <div class="profile_div">
        <?php
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
      ///end of if state ==
        ?>
      </div>
    </nav>
    <script>


    </script>
   	<div id="body_wrapper">
      <div class='lightbox_div'>
        <a href="view/images/cafe_perfecto.jpg"  data-lightbox="roadtrip">Click to view our sponsors !
        <a href="view/images/dataset-original.jpg"  data-lightbox="roadtrip">
        <a href="view/images/sleepbaby.jpg" data-lightbox="roadtrip">
        <a href="view/images/procrastination.jpg"  data-lightbox="roadtrip">
          </a>
      </div>
      <div class="button_div">X</div>
          <div id="form_modal"></div>
      <div class="login_form_div">
      <form id="login_form">
        <div class="error_div">Username or password wrong</div>
         <labeL>User name:</label><br>
         <input name="user_name_login" id="user_login" type="text">
         <br>
         <br>
         <label>Password:</label>
         <br>
         <input name="password_1_login" type="password">
         <input type="submit" id="form_submit_login">
         <br>
         <label><br>Not registered ?<span id="register_here"><a href="sign_up.php?page=register">Sign up here!</a></span></label>
       </form>
     </div>

      <!-- <div class="catergory_div">
        Catergorys
      </div> -->
<?php
if(isset($_SESSION['user'])){
$user = $_SESSION['user']->user_ID;
}
$user_videos = get_user_video($user);
///////////    EDIT PROFILE


  if(isset($_GET['profile']) && isset($_GET['video'])){
    $edit_video = get_edit_video($_GET['video']);
      echo "<div class='video_group_profile_editing'>";
                echo "<a  href="."watch.php?video_ID=".$edit_video->video_ID." class='video_link''>
                        <div class='video_image'><img src=view/images/".$edit_video->video_image." class='thumbnail'></div>
                      </a>";
                echo "<div class='video_description'><input placeholder='".ucfirst($edit_video->video_name)."'></input></div>";
      echo "</div>";
      echo "<div class='edit_video_form'>

      </div>";
  }else{
//The start of the regular page if no link have been set
?>
      <div class="search_div">
        <form id ="search_form"><input name="search_bar" id='search_bar_act' autocomplete="off"></form>
        <div class='search_bar_results'></div>
      </div>
      <div class="pagination">
    <?php
    if(isset($_GET['search_bar'])){
    }else{
    for($i = 1;$i <= $total_pages;$i += 1){
      echo "<a href=home.php?pg=$i>$i</a>";
    }
  }
    ?>

    </div>

        <div class="video_section">
<?php
if(isset($search_results)){
    echo "<h1>Search results</h1>";
foreach ($search_results as $row):
    echo "<div class='video_group'>";
      echo "<a href="."watch.php?video_ID=".$row['video_ID']." class='video_link' ><div class='video_image'><img src=view/images/".$row['video_image']." class='thumbnail'></div></a>";
      echo "<div class='video_description'>".$row['video_name']."</div>";
    echo "</div>";
endforeach;
}else{
  if(isset($_SESSION['user']) && $user_admin === 1){
      foreach ($videos as $row):
        $state = $conn->prepare("SELECT * FROM user_tbl WHERE user_ID = ".$row['user_ID']."");
          $state->execute();
          $result = $state->fetch(PDO::FETCH_OBJ);
          $user = $row['user_ID'];
          $video_details = get_video_details($user);
       echo "<div class='video_group'>";
         echo "<a  href="."watch.php?video_ID=".$row['video_ID']." class='video_link'><div class='video_image'><img src=view/images/".$row['video_image']." class='thumbnail'></div></a>";
         echo "<div class='video_description'>".ucfirst($row['video_name'])."</div>";
         echo "<div class='video_delete'>Delete video</div>";
         echo "<div class='video_delete_sure' onclick='delete_video(".$row['video_ID'].")'>Delete !</div>";
       echo "</div>";
      endforeach;
  }else{
    foreach ($videos as $row):
      $state = $conn->prepare("SELECT * FROM user_tbl WHERE user_ID = ".$row['user_ID']."");
        $state->execute();
        $result = $state->fetch(PDO::FETCH_OBJ);
        $user = $row['user_ID'];
        $video_details = get_video_details($user);
     echo "<div class='video_group'>";
       echo "<a  href="."watch.php?video_ID=".$row['video_ID']." class='video_link'><div class='video_image'><img src=view/images/".$row['video_image']." class='thumbnail'></div></a>";
       echo "<div class='video_description'>".ucfirst($row['video_name'])."</div>";
     echo "</div>";
 endforeach;
  }
}
 }

   ?>
 </div>
      <?php?>
   </div>
   </div>
   <script src="view/lightbox/js/lightbox.js"></script>
   </body>
   <?php?>
   <script>

  function load_edit_page(){
 $("#body_wrapper").load("backend/functions/html_include/edit_page.php");
  }
  function load_profile(){
 $("#body_wrapper").load("backend/functions/html_include/load_profile.php");
  }
$(".video_delete").click(function(event){
  var trgt = event.target;
  $(trgt).next().toggle(trgt);
});
   function delete_video(data){
     $.post("backend/admin_functions/delete_video.php?video="+data+"", function(data) {
   console.log(data);
 });
   }
$('#form_select_user').submit(function(){
     var data = $('#select_user').val();
       $.post("backend/functions/delete_user.php",{user:data}, function(data) {
     console.log(data);
   });
 });

   </script>
 </html>
