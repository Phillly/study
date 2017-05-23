<?php
session_start();
?>
<?php
  require('../../backend/connection/connection.php');
  require('../../backend/functions/get_catergorys.php');
  require('../../backend/functions/get_user_details.php');
  $catergory = get_catergory();
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
     <link href="../STYLES/css/guest.css" rel="stylesheet" type="text/css">
     <script type="text/javascript" src="../STYLES/javascript/jquery-3.1.1.min.js"></script>
     <script type="text/javascript" src="../STYLES/javascript/ajax.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
   </head>
 <body>
 <div id="document_container">
  <?php
    include('../../backend/functions/html_include/nav.php');
  ?>
 	<div id="content_wrapper">
    <div class="cat_buttons_cover">
      <?php // loop through category table here
      foreach ($catergory as $row):
        echo "<div class='cat_buttons'><a href='#' class='cat_link' onclick='show_catergory_content(".$row['catergory_ID'].")'>". $row['catergory_name'] ."</a></div>";
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
    <a href="../../backend/functions/logout.php">Logout</a>
 	</footer>
 </div>
 </body>
 <script>
 function show_catergory_content(value){
      $(".result_div").load("../../backend/functions/load_catergory.php?cat_ID="+value+"");
  //  $(".result_div").load("../../backend/functions/load_catergory.php?value="+value+"");
     console.log(value);
 }
 </script>
 </html>
