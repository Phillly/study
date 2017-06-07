<?php
require('../connection/connection.php');
global $conn;
if(isset($_GET['cat_ID'])){
  $sql = $conn->prepare('SELECT * FROM video_tbl where catergory_ID = :catergory');
  $sql->bindParam(":catergory",$_GET['cat_ID']);
  $sql->execute();
  $result = $sql->fetchAll();
  foreach ($result as $row):
      echo "<div class='video_group'>";
        echo "<a href=watch.php?video_ID=".$row['video_ID']." class='video_link' ><div class='video_image'><img src=view/images/".$row['video_image']." class='thumbnail'></div></a>";
        echo "<div class='video_description'>".$row['video_name']."</div>";
      echo "</div>";
  endforeach;
}

?>
