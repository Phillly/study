<?php
echo "<div class='upload_form_div'>";
echo "<form class='upload_form' method='POST' action='backend/functions/upload_video.php'>";
  echo " <label>Video Name</label><br>
             <input type='text' name='video_name'></input><br>";

  echo "<label>Video Description</label><br>
             <input type='text' name='video_description'></input><br>";

  echo "<label>Video_file</label><br>
             <input type='file' name='video_file' class='fileToUpload'></input><br>";

  echo "<label>Video_image</label><br>
             <input type='file' name='video_image' class='fileToUpload'></input><br>";

  echo "<label>Video_image</label><br>
             <select name='video_cat' class='fileToUpload'>
             <option value='music' selected>music</option>
             <option value='gaming'>gaming</option>
             </select><br>";

  echo "<input type='submit'></input><br>";
echo "</form>";
echo "</div>";
?>
