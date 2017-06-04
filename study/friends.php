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
  require('backend/functions/find_user.php');
    require('backend/functions/check_friend_request.php');
  if(isset($_GET['user_name_search'])){
    $search = $_GET['user_name_search'];
    $search_results = find_user($search);
  }else{}
    if(isset($_GET['user_profile'])){
      $user_desc = $_GET['user_profile'];
      $user_profile = user_prof($user_desc);
    }else{
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
<!doctype html>
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
   <form id="find_user_form">
      <labeL>search user</label><br>
      <input name="user_name_search" id="user_login" type="text">
      <br>
      <input type="submit" id="form_submit_login">
      <br>
    </form>
    <div class="result_div">
      <?php
    if (isset($search_results)) {
        echo "<h1>Search results</h1>";
        $sent_user= $user_details->user_ID;
        $friend_request = check_request($sent_user);
        foreach ($friend_request as $key => $value) {
          $status[] = $value['status'];
        }
        foreach ($search_results as $row ):
          if(in_array('5', $status)){
        echo "1";
      }elseif (in_array(2, $status)) {
        echo "2";
         }else{
        echo "3";
         }

    endforeach;
    } else {}
    if (isset($user_profile)) {
        foreach ($user_profile as $row):
            echo "This users name is" . $row['user_name'] . "";
        endforeach;
    } else {
    }
    ?>
    </div>
 	</div>


 	<footer>
    <a href="backend/functions/logout.php">Logout</a>
 	</footer>
 </div>
 </body>
 <script>

 function add_friend(data){
   console.log(data);
   var friend_data = {"foo": data};
   var zipped_friend_data = JSON.stringify(friend_data);
   $.ajax({
       type: "POST",
       url: "http://localhost/study/backend/functions/send_friend_request.php",
       data: friend_data,
       dataType: "json",
       encode :true,
       complete:function(){
       }
     });
 }
 </script>
 </html>
