<?php
function check_request($sent_user){
  global $conn;
  $stmt = $conn->prepare("SELECT * FROM friend_tbl WHERE user_action_ID = :sent_user");
  $stmt->bindParam(':sent_user', $sent_user);
  $stmt->execute();
  $result = $stmt->fetchAll();
  return $result;

}
?>
