<?php
session_start();
  require('backend/connection/connection.php');
  require('backend/functions/get_video.php');
  require('backend/functions/get_user_details.php');
  require('backend/search.php');
 $get_vid_count = get_video_count();
 $items_per_page = 6;
 // var_dump($items_per_page, $offset);
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
          echo "<div class='user_name_style'><a>Upload video</a></div>";
          echo "<div class='user_name_style'><a>Edit profile</a></div>";
        }else{
          echo "<div class='user_name_style'><span>Not logged in</span>";
          echo "<br>";
          echo "<span class='span_log'>login in here !</span></div>";
        }
      }
        ?>
      </div>
    </nav>
   	<div id="body_wrapper">
      <div class="login_form_div">
      <form id="login_form">
         <labeL>User name:</label><br>
         <input name="user_name_login" id="user_login" type="text">
         <br>
         <br>
         <label>Password:</label>
         <br>
         <input name="password_1_login" type="password">
         <input type="submit" id="form_submit_login">
         <br>
         <label><br>Not registered ?<span id="register_here"><a href="sign_up.php?register">Sign up here!</a></span></label>
       </form>
     </div>

      <!-- <div class="catergory_div">
        Catergorys
      </div> -->
<?php
if(isset($_GET['profile']) || $_GET['edit_profile']){
  echo "<div class='profile_div'>";
  echo "<div class='name_div'>User Name</div>";
  echo "<div class='email_div'>Email</div>";
  echo "<div class='password_div'>Videos</div>";
  echo "<div class='password_div' onclick='edit_profile(".$user_details->user_ID.")'>Edit Profile</div>";
  echo "<div class='password_div'>Delete Profile</div>";
  echo "</div>";
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
      echo "<a href="."watch.php?video_ID=".$row['video_ID']." class='video_link' ><div class='video_image'><img src=public_view/".$row['video_image']." class='thumbnail'></div></a>";
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
         echo "<a  href="."watch.php?video_ID=".$row['video_ID']." class='video_link'><div class='video_image'><img src=public_view/".$row['video_image']." class='thumbnail'></div></a>";
         echo "<div class='video_description'>".ucfirst($row['video_name'])."</div>";
       echo "</div>";
   endforeach;
 }
   ?>
 </div>
      <?php
    //   foreach ($videos as $row):
    //    echo "<div class='video_cover'>";
    //      echo "<div class='video_group'>";
    //        echo "<a><div class='video_image'><img src=public_view/".$row['video_image']." class='thumbnail'></div></a>";
    //        echo "<div class='video_description'>".$row['video_desc']."</div>";
    //      echo "</div>";
    //      echo "<div class='video_group'>";
    //        echo "<a><div class='video_image'><img src=public_view/".$row['video_image']." class='thumbnail'></div></a>";
    //        echo "<div class='video_description'>".$row['video_desc']."</div>";
    //      echo "</div>";
    //    echo "</div>";
    //  endforeach;

                  // foreach ($videos as $row):
                  //   $state = $conn->prepare("SELECT * FROM user_tbl WHERE user_ID = ".$row['user_ID']."");
                  //   $state->execute();
                  //   $result = $state->fetch(PDO::FETCH_OBJ);
                  //   $user = $row['user_ID'];
                  //   $video_details = get_video_details($user);
                  //   echo "<div class='video_image'>";
                  //       echo "<a href="."watch.php?video_ID=".$row['video_ID'].">";
                  //         echo "<div class='description'>Description-<br>".$row['video_desc']."</div>";
                  //         echo "<img src=public_view/".$row['video_image']." class='thumbnail'>";
                  //       echo "</a>";
                  //     echo "<p class='video_desc'>".ucfirst($row['video_name'])."</p>";
                  //       echo "<p class='video_desc'>-".ucfirst($result->user_name)."</p>";
                  //   echo "</div>";
                  // endforeach
                  //
                  //
                }?>
   </div>

   </div>
   </body>
   <script>
   function edit_profile(user){
     
   }
   </script>
 </html>
