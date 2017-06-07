<?php
session_start();
?>
<?php
  require('backend/connection/connection.php');
  require('backend/functions/get_catergorys.php');
  $catergory = get_catergory();
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
  echo '
  <nav>
         <div id="menu">&#9776;</div>
         <ul id="main_ul">
          <li class="li_item"><a href="home.php">HOME</a></li>
          <li class="li_item"><a href="popular_videos.php">Popular Videos</a></li>
          <li class="li_item"><a href="discover_videos.php">Discover Videos</a></li>
          <li class="li_item"><a href="friends.php">Friends</a></li>
        </ul>
            <div class="profile_div">';
            if(isset($_SESSION['state'])){
              if($_SESSION['state'] == 'auth'){
            echo "<div class='user_name_style' onclick='load_profile()'>".ucfirst($user_details->user_name)."</div>";
              echo "<div class='user_name_style' onclick='load_upload_page()'><a>Upload video</a></div>";
              echo "<div class='user_name_style' onclick='load_edit_page()'><a>Edit profile</a></div>";
          }else{
            echo "<div class='user_name_style'><span>Not logged in</span>";
            echo "<br>";
            echo "<span class='span_log'>login in here !</span></div>";
          }
          }
        echo '
        </div>
  </nav>
  ';

  ?>
 	<div id="content_wrapper">
    <div class="cat_buttons_cover">
      <?php // loop through category table here
      foreach ($catergory as $row):
        echo "<div class='cat_buttons'><a href='#' class='cat_link' onclick='show_catergory_content(".$row['catergory_ID'].")'><img class='cat_image' src='view/images/".$row['catergory_image']."'></a></div>";
      endforeach
      //echo "<a href=\"#\" onclick=\"dofunct($row['catid'])\">" . $row['catName'] . "</a>";
      ?>
    </div>
      <div class="result_div">
        <?php

        // if($_GET['cat'] == 1){
        //   echo "1";
        // }else{
        // }
        ?>
        Results here
      </div>
 	</div>


 	<footer>
    <a href="backend/functions/logout.php">Logout</a>
 	</footer>
 </div>
 </body>
 <script>
 function show_catergory_content(value){
      $(".result_div").load("backend/functions/load_catergory.php?cat_ID="+value+"");
  //  $(".result_div").load("../../backend/functions/load_catergory.php?value="+value+"");
     console.log(value);
 }
 var i = 0;
 var cat_links = document.querySelectorAll(".cat_link");
 var cat_buttons = document.querySelectorAll(".cat_buttons");
 do {
     cat_links[i].addEventListener("mouseover", function(event) {
         var trgt = event.target;
         console.log(trgt);
         $(trgt).animate({height: "20vh"}, 300 );
     });
     cat_links[i].addEventListener("mouseout", function(event) {
         var trgt = event.target;
         console.log(trgt);
         $(trgt).animate({height: "15vh"}, 0 );
     });
     i++;
 } while (i < cat_buttons.length);
 </script>
 </html>
