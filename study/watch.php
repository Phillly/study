<?php
session_start();
require('backend/connection/connection.php');
require('backend/functions/Get_functions/get_video.php');
require('backend/functions/add_view.php');
if(isset($_GET['video_ID'])){
  $video = $_GET['video_ID'];
  $video_func =  get_video_ID($video);
  $user = $video_func->user_ID;
  $user_video_details = get_user_video_details($user);
}
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
  add_view($video);
?>
<html>
   <head>
      <meta charset="utf-8">
      <title>Watch</title>
      <link href="view/STYLES/css/guest.css" rel="stylesheet" type="text/css">
      <script type="text/javascript" src="view/STYLES/javascript/jquery-3.1.1.min.js"></script>
     <script type="text/javascript" src="view/STYLES/javascript/ajax.js"></script>
      <script src="https://code.jquery.com/jquery-3.1.1.js"integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
</head>
<body>
<div id="document_container">
    <?php
    include('backend/functions/html_include/nav.php');

    ?>


 	<div id="body_wrapper">
      <div id="watch">
          <video width="40%" controls>
          <?php echo "<source src=view/video/".$video_func->video_file.">";?>
            </video>
            <div id='accordion'>
              <h1>Video Description</h1>
              <div><?php echo ucfirst($video_func->video_desc);?></div>
              <h2>Uploader</h2>
              <div><?php echo ucfirst($user_video_details->user_name);?></div>
            </div>

      </div>
 	</div>



 </div>
 <footer>
    <a href="backend/functions/logout.php">Logout</a>
 </footer>
 <script>$( function() {
    $( "#accordion" ).accordion();
  } );</script>

 </body>
 </html>
