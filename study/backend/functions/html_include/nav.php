<?php
echo '
<nav>
   <div id="menu">&#9776;</div>
   <ul id="main_ul">
    <li class="li_item"><a href="home.php">HOME</a></li>
    <li class="li_item"><a href="popular_videos.php">Popular Videos</a></li>
    <li class="li_item"><a href="discover_videos.php">Discover Videos</a></li>
    <li class="li_item"><a href="friends.php">Friends</a></li>
  </ul>
  <div class="profile_div">';
  if(isset($_SESSION['state'])){
    if($_SESSION['state'] == 'auth'){
      echo "<div class='user_name_style'><a href='home.php' class='home_div'>Home </a></div>";
}else{
    echo "<div class='user_name_style'><span>Not logged in</span>";
    echo "<br>";
    echo "<span class='span_log'>login in here !</span></div>";
}
}
  echo '
  </div>
</nav>
';
?>
