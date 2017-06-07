<?php
session_start();
require('../../connection/connection.php');
if(isset($_SESSION['user'])){
  $user_details = $_SESSION['user'];
};
if($_SERVER["REQUEST_METHOD"] == "POST") {
$recieve_user = $_POST['accept'];
 $active_user = $user_details->user_ID;
function accept_friend_request($recieve_user,$active_user){
    global $conn;
    $stmt = $conn->prepare("UPDATE friend_tbl  SET status = 1 WHERE user_recieve = :user1 AND user_action = :user2");
    $stmt->bindParam(':user1', $active_user);
    $stmt->bindParam(':user2', $recieve_user);
    $stmt->execute();
}
accept_friend_request($recieve_user,$active_user);
}
?>
