<?php
session_start();
  require('backend/connection/connection.php');
  require('backend/functions/get_video.php');
  require('backend/functions/get_user_details.php');
  ?>
  <?php
 $get_vid_count = get_video_count();
 $items_per_page = 3;
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
    header("location:guest_home.php?pg=".$total_pages);
  }
  if($page_number < 1){
    header("location:guest_home.php?pg=1");

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

?>
<html>
   <head>
     <meta charset="utf-8">
     <title>home</title>
     <meta name="viewport" content="width=device-width"/>
     <link href="public_view/STYLES/css/guest.css" rel="stylesheet" type="text/css">
     <script type="text/javascript" src="public_view/STYLES/javascript/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="public_view/STYLES/javascript/ajax.js"></script>

 <body>
 <div id="document_container">
 	<header>
  </header>
  <nav>
     <ul id="main_ul">
      <li class="li_item"><a href="guest_home.php">HOME</a></li>
      <li class="li_item"><a href="public_view/guest_view/guest_popular_videos.php">Popular Videos</a></li>
      <li class="li_item"><a href="public_view/guest_view/guest_discover_videos.php">Discover Videos</a></li>
      <li class="li_item"><a href="public_view/guest_view/guest_friends.php">Friends</a></li>
      <li class="li_item"><a href="public_view/guest_view/sign_up.php">
        <?php
        if(isset($_SESSION['state'])){
        if($_SESSION['state'] == 'auth'){
          echo "Profile";
        }else{
          echo "SignIn";
        }
      }
        ?>
        </a></li>
    </ul>

  </nav>

 	<div id="body_wrapper">
    <aside>
          <?php
            if(isset($_SESSION['state'])){
              if($_SESSION['state'] == 'auth'){
            echo "<div class='user_name_style'>User Name: <span>".$user_details->user_name."</span></div>";
            echo "<div class='user_name_style'>Email: <span>".$user_details->email."</span></div>";
          }else{
            echo "<div class='user_name_style'><span>Not logged in</span></div>";
            echo "<br>";
            echo "<div class='user_name_style'><span class='span_log'>login in here !</span></div>";
          }
        }
          ?>
    </aside>
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
       <label><br>Not registered ?<span id="register_here"><a href="public_view/guest_view/sign_up.php?register">Sign up here!</a></span></label>
     </form>
   </div>
            <section class="body_section">
              <div class="search_div">  <form id ="search_form"><input name="search_bar"></form></div>
              <?php

              foreach ($videos as $row):
                $state = $conn->prepare("SELECT * FROM user_tbl WHERE user_ID = ".$row['user_ID']."");
                $state->execute();
                $result = $state->fetch(PDO::FETCH_OBJ);
                $user = $row['user_ID'];
                $video_details = get_video_details($user);
                echo "<div class='video_image'>";
                    echo "<a href="."watch.php?video_ID=".$row['video_ID'].">";
                      echo "<div class='description'>Description-<br>".$row['video_desc']."</div>";
                      echo "<img src=public_view/".$row['video_image']." class='thumbnail'>";
                    echo "</a>";
                  echo "<p class='video_desc'>".ucfirst($row['video_name'])."</p>";
                    echo "<p class='video_desc'>-".ucfirst($result->user_name)."</p>";
                echo "</div>";
              endforeach

              ?>
            </section>
            <div id="pagination">
          <?php
          if(isset($_GET['search_bar'])){
          }else{
          for($i = 1;$i <= $total_pages;$i += 1){
            echo "<a href=guest_home.php?pg=$i>$i</a>";
          }
        }
          ?>

          </div>
  </div>
 	<footer>
    <a href="backend/functions/logout.php">Logout</a>
 	</footer>
 </div>
 </body>
 </html>
