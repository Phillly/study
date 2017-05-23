<?php
session_start();
require('backend/connection/connection.php');
require('backend/functions/get_video.php');
if(isset($_GET['video_ID'])){
  $video = $_GET['video_ID'];
  $video_func =  get_video_ID($video);
}
?>
<html>
   <head>
      <meta charset="utf-8">
      <title>Watch</title>
      <link href="view/STYLES/css/guest.css" rel="stylesheet" type="text/css">
      <script type="text/javascript" src="view/STYLES/javascript/jquery-3.1.1.min.js"></script>
     <script type="text/javascript" src="view/STYLES/javascript/ajax.js"></script>
      <script type="text/javascript" src="../javascript\ajax.js"></script>
      <script src="https://code.jquery.com/jquery-3.1.1.js"
       integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
       crossorigin="anonymous">
      </script>
</head>
<body>
<div id="document_container">
<nav>
   <div id="menu">&#9776;</div>
   <ul id="main_ul">
    <li class="li_item"><a href="home.php">HOME</a></li>
    <li class="li_item"><a href="popular_videos.php">Popular Videos</a></li>
    <li class="li_item"><a href="discover_videos.php">Discover Videos</a></li>
    <li class="li_item"><a href="friends.php">Friends</a></li>
    <li class="li_item"><a href="sign_up.php"></a></li>
  </ul>
  <div class="profile_div">
    <?php
      if(isset($_SESSION['state'])){
        if($_SESSION['state'] == 'auth'){
      echo "<div class='user_name_style'>User Name:<span>".$user_details->user_name."</span><br>";
      echo "Email: <span>".$user_details->email."</span></div>";
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
      <div id="watch">
          <video width="40%" controls>
          <?php echo "<source src=".$video_func->video_file.">";?>
            </video>

      </div>
 	</div>


 	<footer>
      <a href="backend/functions/logout.php">Logout</a>
 	</footer>
 </div>
 </body>
 </html>
