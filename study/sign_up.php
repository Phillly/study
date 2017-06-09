<?php
session_start();

  require('backend/connection/connection.php');
    if(!isset($_SESSION['state'])){
      $_SESSION['state'] = 'guest';
    };
    if(isset($_SESSION['user'])){
    $user = $_SESSION['user']->user_ID;
  }
?>
<html>
   <head>
     <meta charset="utf-8">
     <title>home</title>
 <link href="view/STYLES/css/guest.css" rel="stylesheet" type="text/css">

</head>
 <body>
 <div id="document_container">
        <?php
        echo '
        <nav>
           <div id="menu">&#9776;</div>
           <ul id="main_ul">
            <li class="li_item"><a href="home.php">HOME</a></li>
            <li class="li_item"><a href="popular_videos.php">Popular Videos</a></li>
            <li class="li_item"><a href="discover_videos.php">Discover Videos</a></li>
            <li class="li_item"><a href="friends.php">Friends</a></li>
          </ul>
          <div class="profile_div"></nav>';
        ?>
 	<div class="body_wrapper_sign_up_page">
        <section class="body_section">
            <?php

          include("backend/functions/html_include/reg_form.php");

            ?>
        </section>

 	</div>


 	<footer>
    <a href="../../backend/functions/logout.php">Logout</a>
 	</footer>
 </div>
 <script type="text/javascript" src="view/STYLES/javascript/jquery-3.1.1.min.js"></script>
 <script type="text/javascript" src="view/STYLES/javascript/ajax.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 </body>
 </html>
