<?php
session_start();
?>
<?php
  require('../../backend/connection/connection.php');
    require('../../backend/functions/get_video.php');
    require('../../backend/functions/get_user_details.php');
    $user_details = get_user_details();
    if(!isset($_SESSION['state'])){
      $_SESSION['state'] = 'guest';
    };
    if(isset($_SESSION['user'])){
      $user_details = $_SESSION['user'];
    };
    $user = $_SESSION['user']->user_ID;
  $user_videos = get_user_video($user);
?>
<html>
   <head>
     <meta charset="utf-8">
     <title>home</title>
 <link href="../STYLES/css/guest.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../STYLES/javascript/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="../STYLES/javascript/ajax.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 <body>
 <div id="document_container">
        <?php
            include('../../backend/functions/html_include/nav.php');
        ?>
 	<div class="body_wrapper_sign_up_page">
        <section class="body_section">
            <?php
            if(isset($_SESSION['state'])){
              if($_SESSION['state'] == 'auth'){
            foreach ($user_videos as $row):
              echo "<div class='video_image'>";
                  echo "<a href="."watch.php?video_ID=".$row['video_ID'].">";
                    echo "<div class='description'>Description-<br>".$row['video_desc']."</div>";
                    echo "<img src=../".$row['video_image']." class='thumbnail'>";
                  echo "</a>";
                echo "<p class='video_desc'>".$row['video_name']."</p>";
              echo "</div>";
            endforeach;
          }
        }
            ?>
        </section>

 	</div>


 	<footer>
    <a href="../../backend/functions/logout.php">Logout</a>
 	</footer>
 </div>
 </body>
 </html>
