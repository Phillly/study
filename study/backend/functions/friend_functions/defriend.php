<?php
session_start();
require('../../connection/connection.php');
if(isset($_SESSION['user'])){
  $user_details = $_SESSION['user'];
};
if($_SERVER["REQUEST_METHOD"] == "POST") {
$recieve_user = $_POST['foo'];
 $active_user = $user_details->user_ID;
function defriend($recieve_user,$active_user){
    global $conn;
    $stmt = $conn->prepare("DELETE FROM friend_tbl WHERE user_action = :user2 AND user_recieve = :user1 ");
    $stmt->bindParam(':user1', $active_user);
    $stmt->bindParam(':user2', $recieve_user);
    $stmt->execute();
}
defriend($recieve_user,$active_user);
}

?>
