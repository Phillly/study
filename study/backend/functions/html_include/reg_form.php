<?php
if ($_SESSION['state'] == 'auth') {
} else {
  if (isset($_GET['page'])) {
      $page = $_GET['page'];
      if ($page == "login") {
          echo '<div class="login_form_div_sign_up_page">
        <form id="login_form">
           <labeL>User name:</label><br>
           <input name="user_name_login" id="user_login" type="text">
           <br>
           <br>
           <label>Password:</label>
           <br>
           <input name="password_1_login" type="password">
           <input type="submit" id="form_submit_login">
           <br>
           <label><br>Not registered ? <span id="register_here"><a href="sign_up.php?page=register">Sign up here!</a></span></label>
         </form>
              </div>';
      }
      if ($page == "register") {
          echo '<div class="register_form_sign_up_page">
                    <form id="register_form">
                    <label  class="sign_up_headers">Have an account ? <a href="sign_up.php?page=login" id="login_here">Login here</a></label>
                    <div class="register_form_error">Fields Cant be left blank</div>
                    <labeL>User name:</label><br>
                    <input name="user_name" id="user" type="text">
                    <br>
                    <div class="register_form_error">User name exist --- Note- add a system that suggest a username</div>
                    <br>
                    <labeL>Email:</label><br>
                    <input name="email" id="email" type="text">
                    <br>
                    <div class="register_form_error">Email invalid</div>
                    <div class="register_form_error">Email already exist</div>
                    <br>
                    <label>Password:</label>
                    <br>
                    <input name="password_1" type="password">
                    <br>
                    <label>Confirm Password:</label>
                    <br>
                    <input name="password_2" type="password">
                    <br>
                    <div class="register_form_error">Passwords dont match !</div>
                    <br>
                    <input type="submit" id="form_submit">
                </form>
          </div>';
      }
  } else {
      echo '<div class="login_form_div_sign_up_page">
  <form id="login_form">
     <labeL>User name:</label><br>
     <input name="user_name_login" id="user_login" type="text">
     <br>
     <br>
     <label>Password:</label>
     <br>
     <input name="password_1_login" type="password">
     <input type="submit" id="form_submit_login">
     <br>
     <label><br>Not registered ? <span id="register_here"><a href="sign_up.php?page=register">Sign up here!</a></span></label>
   </form>
      </div>';
  }
}
?>
