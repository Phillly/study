<?php
session_start();
?>
<?php
  require('backend/connection/connection.php');
  require('backend/functions/get_popular_video.php');
  $popular = get_popular();
  if(!isset($_SESSION['state'])){
    $_SESSION['state'] = 'guest';
  };
  if(isset($_SESSION['user'])){
    $user_details = $_SESSION['user'];
  };
?>
<html>
   <head>
     <meta charset="utf-8">
     <title>home</title>
     <link href="view/STYLES/css/guest.css" rel="stylesheet" type="text/css">
     <script type="text/javascript" src="view/STYLES/javascript/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="view/STYLES/javascript/ajax.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  </head>

 <body>
 <div id="document_container">
  <?php
      include('backend/functions/html_include/nav.php');
  ?>
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
   <div class='popular_div'>
   </div>
   <?php
foreach ($popular as $row) {
  echo "<div class='video_group'>";
    echo "<a href="."watch.php?video_ID=".$row['video_ID']." class='video_link' ><div class='video_image'><img src=view/images/".$row['video_image']." class='thumbnail'></div></a>";
    echo "<div class='video_description'>".$row['video_name']."</div>";
    echo "<div class='video_description'>Views:".$row['views']."</div>";

  echo "</div>";
}

    ?>
 	</div>


 	<footer>
    <a href="backend/functions/logout.php">Logout</a>
 	</footer>
 </div>
 </body>
 </html>
