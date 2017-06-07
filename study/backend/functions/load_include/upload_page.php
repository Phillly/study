<?php
include("../../connection/connection.php");
include("../get_catergorys.php");
$cat = get_catergory();
echo "<div class='upload_form_div'>
  <form class='upload_form' method='POST' enctype='multipart/form-data' action='backend/functions/profile_functions/upload_video.php'>
     <label>Video Name</label><br>
               <input type='text' name='video_name'></input><br>

    <label>Video Description</label><br>
               <input type='text' name='video_description'></input><br>

  <label>Video_file</label><br>
               <input type='file' name='video_file' class='fileToUpload'></input><br>
               <label>Video_image</label><br>
                            <input type='file' name='video_image' class='fileToUpload'></input><br>

               <select name='video_cat' class='fileToUpload'>";

               foreach ($cat as $key) {
                 echo "<option value='".$key['catergory_name']."' name='video_cat'>".$key['catergory_name']."</option>";
               }

               echo "</select><br>
    <input type='submit'></input><br>
  </form>
  </div>";
  ?>
