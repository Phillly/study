<?php
session_start();
  require('backend/connection/connection.php');
  require('backend/functions/get_video.php');
  require('backend/functions/get_user_details.php');
  require('backend/search.php');
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

$user_details = get_user_details();
if(!isset($_SESSION['state'])){
  $_SESSION['state'] = 'guest';
};
if(isset($_SESSION['user'])){
  $user_details = $_SESSION['user'];
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
     <script type="text/javascript" src="view/STYLES/javascript/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="view/STYLES/javascript/ajax.js"></script>

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
          if(isset($_SESSION['state'])){
            if($_SESSION['state'] == 'auth'){
          echo "<div class='user_name_style'><a href='home.php?profile=".$user_details->user_ID."'>".ucfirst($user_details->user_name)."</a></div>";
          if(isset($_GET['profile'])){
            echo "<div class='user_name_style'><a>Upload video</a></div>";
            echo "<div class='user_name_style'><a>Edit profile</a></div>";
          }else{
          echo "<div class='user_name_style'><a href='upload.php'>Upload video</a></div>";
          echo "<div class='user_name_style'><a href='home.php?profile=".$user_details->user_ID."&edit=profile'>Edit profile</a></div>";
        }
        }else{
          echo "<div class='user_name_style'><span>Not logged in</span>";
          echo "<br>";
          echo "<span class='span_log'>login in here !</span></div>";
        }
      }
      ///end of if state ==
        ?>
      </div>
    </nav>
   	<div id="body_wrapper">
      <div class="button_div">X</div>
          <div id="form_modal"></div>
      <div class="login_form_div">
      <form id="login_form">
        <div class="error_div"></div>
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
$user = $_SESSION['user']->user_ID;
$user_videos = get_user_video($user);
///////////    EDIT PROFILE
if(isset($_GET['profile'])){
  if(isset($_GET['edit'])){
echo "EDIT PAGE";
  }else{
  if(isset($_GET['profile']) && isset($_GET['video'])){}else{
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
// End of if get EDIT is set

// End of if get UPLOAD is set
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
          <input></input>
          <input></input>
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
      echo "<div class='video_description' onclick='edit_video()'><a href='home.php?profile=".$_GET['profile']."&video=".$row['video_ID']."'>Edit Video</a></div>";
    echo "</div>";
  endforeach;
}
///end of edit else
}
//end of edit video else
}
// end of if state == auth
echo "</div>";
//The start of the regular page if no link have been set
}else{
?>
      <div class="search_div">
        <form id ="search_form"><input name="search_bar"></form>
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
      echo "<a href="."watch.php?video_ID=".$row['video_ID']." class='video_link' ><div class='video_image'><img src=view/".$row['video_image']." class='thumbnail'></div></a>";
      echo "<div class='video_description'>".$row['video_name']."</div>";
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
         echo "<a  href="."watch.php?video_ID=".$row['video_ID']." class='video_link'><div class='video_image'><img src=view/".$row['video_image']." class='thumbnail'></div></a>";
         echo "<div class='video_description'>".ucfirst($row['video_name'])."</div>";
       echo "</div>";
   endforeach;
 }
 }
   ?>
 </div>
      <?php}?>
   </div>
   </div>
   </body>
   <script>
   function edit_profile(user){
   }
   function edit_video(event){
     event.target.style.visibility = 'hidden';
   }
  //  if ($(window).scrollTop() >= ($(document).height() - $(window).height())*0.7){
  //    $(".video_section").after().load("backend/functions/get_video.php");
  //  }

   </script>
 </html>
