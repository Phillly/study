<?php
session_start();

  require('backend/connection/connection.php');
  include("backend/functions/get_catergorys.php");
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
<script type="text/javascript" src="view/STYLES/javascript/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="view/STYLES/javascript/ajax.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
 <body>
 <div id="document_container">
        <?php
            include('backend/functions/html_include/nav.php');
        ?>
 	<div class="body_wrapper_sign_up_page">
        <section class="body_section">

            <div class='upload_form_div'>
              <?php
              if(isset($_GET['input_fields'])){
            echo "<div class='upload_empty'>All form fields need to be correct and filled out</div>";
          }else{}

              ?>
              <div class='all_fields'>All Fields required *</div>
            <form class='upload_form' enctype='multipart/form-data' method="post" action="backend/functions/upload_video.php">
               <label>Video Name *</label><br>
                         <input type='text' name='video_name'></input><br>

              <label>Video Description *</label><br>
                         <input type='text' name='video_description'></input><br>
                         <?php
                         if(isset($_GET['wrong_video'])){
                           echo "<div class='upload_empty'>Wrong video type Mp4 and Mp3 only</div><br>";
                         }
                         ?>

              <label>Video_file *</label><br>
                         <input type='file' name='video_file' class='fileToUpload'></input><br>

              <label>Video_image *</label><br>
                         <input type='file' name='video_image' class='fileToUpload'></input><br>
              <?php
              if(isset($_GET['wrong_image'])){
                echo "<div class='upload_empty'>Wrong image type JPEG JPG PNG AND GIF allowed only</div>";
              }
              ?>

                         <select name='video_cat' class='fileToUpload'>
                           <?php
                           $cat = get_catergory_load();
                         foreach ($cat as $key) {
                           echo "<option value='".$key['catergory_name']."' name='video_cat'>".$key['catergory_name']."</option>";
                         }
                         ?>

                         </select><br>

              <input type='submit' id='upload_form_submit'></input><br>
            </form>
            </div>


        </section>

 	</div>


 	<footer>
    <a href="../../backend/functions/logout.php">Logout</a>
 	</footer>
 </div>

 </body>
 </html>
