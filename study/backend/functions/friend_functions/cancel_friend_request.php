<?php
session_start();
require('../../connection/connection.php');
if(isset($_SESSION['user'])){
  $user_details = $_SESSION['user'];
};
if($_SERVER["REQUEST_METHOD"] == "POST") {
$recieve_user = $_POST['foo'];
 $active_user = $user_details->user_ID;
function cancel_friend_request($recieve_user,$active_user){
    global $conn;
    $stmt = $conn->prepare("DELETE FROM friend_tbl WHERE user_action = :user1 AND user_recieve = :user2");
    $stmt->bindParam(':user1', $active_user);
    $stmt->bindParam(':user2', $recieve_user);
    $stmt->execute();
}
cancel_friend_request($recieve_user,$active_user);
}
?>
