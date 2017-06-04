<?php
session_start();
require('../connection/connection.php');
if(isset($_SESSION['user'])){
  $user_details = $_SESSION['user'];
};

if($_SERVER["REQUEST_METHOD"] == "POST") {

$recieve_user = $_POST['foo'];
$sent_user = $user_details->user_ID;
$status = 1;
function check_if_request_exist($sent_user){
  global $conn;
$stmt = $conn->prepare("SELECT * FROM `friend_tbl` WHERE user_action_ID = $sent_user");
$stmt->execute();
$result = $stmt->fetchAll();
}
if(check_if_request_exist($sent_user) == false){
function send_friend_request($recieve_user,$sent_user){
    global $conn;
$stmt = $conn->prepare("INSERT INTO friend_tbl (status,user_sent,user_recieve) VALUES (1,:user1,:user2)");
$stmt->bindParam(':user1', $sent_user);
$stmt->bindParam(':user2', $recieve_user);
$stmt->execute();
}
}else{

}
send_friend_request($recieve_user,$sent_user);
check_if_request_exist($sent_user);
}
 ?>
