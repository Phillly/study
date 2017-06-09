<?php
function get_catergory($cat_post){
  global $conn;
  $sql = $conn->prepare("SELECT catergory_ID FROM catergory_tbl where catergory_name = '$cat_post'");
  $sql->execute();
  $catergory = $sql->fetch();
  return $catergory;
}
function get_catergory_load(){
  global $conn;
  $sql = $conn->prepare("SELECT * FROM catergory_tbl");
  $sql->execute();
  $catergory = $sql->fetchAll();
  return $catergory;
}
 ?>
