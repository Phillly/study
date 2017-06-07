<?php
include("../../connection/connection.php");
include("../get_catergorys.php");
$cat = get_catergory();
print_r($cat);
echo "<div class='upload_form_div'>";
echo "<form class='upload_form' method='POST' action='backend/functions/upload_video.php' enctype='multipart/form-data'>";
  echo " <label>Video Name</label><br>
             <input type='text' name='video_name'></input><br>";

  echo "<label>Video Description</label><br>
             <input type='text' name='video_description'></input><br>";

  echo "<label>Video_file</label><br>
             <input type='file' name='video_file' class='fileToUpload'></input><br>";

  echo "<label>Video_image</label><br>
             <input type='file' name='video_image' class='fileToUpload'></input><br>";

  echo "<label>Video_image</label><br>
             <select name='video_cat' class='fileToUpload'>";
             foreach ($cat as $key) {
               echo "<option value='".$key['catergory_name']."' name='video_cat'>".$key['catergory_name']."</option>";
             }

             echo "</select><br>";

  echo "<input type='submit'></input><br>";
echo "</form>";
echo "</div>";
?>
