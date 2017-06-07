
<?php
session_start();
?>
<?php
  require('backend/connection/connection.php');
  require('backend/functions/get_user_details.php');
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
    <div id="form_modal"></div>
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
       <label><br>Not registered ? <span id="register_here"><a href="#">Sign up here!</a></span></label>
     </form>
   </div>
   <div class='upload_form_div'>
   <?php
   include("backend/connection/connection.php");
   include("backend/functions/get_catergorys.php");
   $cat = get_catergory();
   <div class='upload_form_div'>
     <form class='upload_form' method='POST' enctype='multipart/form-data'>
        <label>Video Name</label><br>
                  <input type='text' name='video_name'></input><br>

       <label>Video Description</label><br>
                  <input type='text' name='video_description'></input><br>

     <label>Video_file</label><br>
                  <input type='file' name='video_file' class='fileToUpload'></input><br>
                  <label>Video_image</label><br>
                               <input type='file' name='video_image' class='fileToUpload'></input><br>

                  <select name='video_cat' class='fileToUpload'>
                    <?php
                  foreach ($cat as $key) {
                    echo "<option value='".$key['catergory_name']."' name='video_cat'>".$key['catergory_name']."</option>";
                  }
                  ?
                  </select><br>
       <input type='submit'></input><br>
     </form>
     </div>
 </div>
 	</div>


 	<footer>
    <a href="backend/functions/logout.php">Logout</a>
 	</footer>
 </div>
 </body>
 <script>
 $('.upload_form').submit(function(event) {
   var drop = $('.dropzone').val();
   event.preventDefault();
   var form_value = $('.upload_form').serialize();
   console.log(form_value);
   console.log(drop);

 });
 </script>
 </html>
