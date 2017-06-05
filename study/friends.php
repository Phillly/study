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
    $user = $user_details->user_name;
  };
  require('backend/functions/find_user.php');
    require('backend/functions/check_friend_request.php');
  if(isset($_GET['user_name_search'])){
    $search = $_GET['user_name_search'];
    $search_results = find_user($search,$user);
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
       $sent_user= $user_details->user_ID;
    if (isset($search_results)) {
        echo "<h1>Search results</h1>";
        foreach ($search_results as $row) {
          ///////////////////////////////////////////
          $sql = $conn->prepare('SELECT * FROM friend_tbl where user_action = :active_user AND user_recieve = :not_active_user ');
          $sql->bindParam(':active_user', $sent_user);
          $sql->bindParam(':not_active_user', $row['user_ID']);
          $sql->execute();
          $result = $sql->fetch();
          ///////////////////////////////////////////
          $sql_2 = $conn->prepare('SELECT * FROM friend_tbl where user_action = :not_active_user or user_recieve = :active_user ');
          $sql_2->bindParam(':active_user', $sent_user);
          $sql_2->bindParam(':not_active_user', $row['user_ID']);
          $sql_2->execute();
          $result_2 = $sql_2->fetch();

          ///////////////////////////////////////////
          // if($row['id'] == $sent_user){
          if($sql->rowCount() > 0) {
            // I have a frend
            if($sql->rowCount() >= 1 && $result['status'] == 1 && $row['user_ID'] != $sent_user){
              echo "<div>".$row['user_name']." <div onclick='defriend(".$row['user_ID'].")' class='add_friend'>Friend</div><div>";
            }
              // is the friendship solid?
            if($sql->rowCount() >= 1 && $result['status'] == 2 && $row['user_ID'] != $sent_user){
                echo "<div>".$row['user_name']." <div onclick='cancel_friend(".$row['user_ID'].")' class='add_friend'>Pending friend request</div><div>";
            }
            // otherwise
            // I'm waiting;

          } elseif($sql_2->rowCount() > 0) {
            // Someone is my friend
            if($sql_2->rowCount() >= 1 && $result_2['status'] == 1 && $row['user_ID'] != $sent_user){
                echo "<div>".$row['user_name']." <div onclick='defriend(".$row['user_ID'].")' class='add_friend'>Friend</div><div>";
                break;
            }
            // is the friendship solid?
            elseif($sql_2->rowCount() >= 1 && $result_2['status'] == 2 && $row['user_ID'] != $sent_user){
              echo "<div>".$row['user_name']." <div onclick='cancel_friend(".$row['user_ID'].")' class='add_friend'>Accept friend request</div><div>";

            }
            //otherwise
            // I accept
          } else {
            // they are no friend requests;
            if($sql->rowCount() < 1 && $sql_2->rowCount() < 1 && $row['user_ID'] != $sent_user){
                  echo "<div>".$row['user_name']." <div onclick='add_friend(".$row['user_ID'].")' class='add_friend'>Add friend</div><div>";
              }
            // ge a friend.
          }
        //}


          //////////////////////////////////////////

          }
    }else{}
      // print_r($_SESSION);
      // print_r($sent_user);
         print_r($result_2);
        print_r($result);

    // if (isset($user_profile)) {
    //     foreach ($user_profile as $row):
    //         echo "This users name is" . $row['user_name'] . "";
    //     endforeach;
    // } else {
    // }
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
  //  var zipped_friend_data = JSON.stringify(friend_data);
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
