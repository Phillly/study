<?php
function get_catergory(){
  global $conn;
  $sql = $conn->prepare("SELECT * FROM catergory_tbl");
  $sql->execute();
  $catergory = $sql->fetchAll();
  return $catergory;
}
 ?>
