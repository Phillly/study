<?php
function view_users(){
  global $conn;
  $qry = $conn->prepare("SELECT * FROM user_tbl ");
  $qry->execute();
  $details = $qry->fetchAll();
  return $details;
}
?>
