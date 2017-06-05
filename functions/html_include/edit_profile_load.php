<?php
if(isset($_GET['profile'])){
if($_GET['profile'] == 'upload'){
echo "upload";
}
if($_GET['profile'] == 'edit_profile'){
echo "edit_profile";
}
if ($_GET['profile'] == 'profile') {
echo "profile";
}
}
?>
