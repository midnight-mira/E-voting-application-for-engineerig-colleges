
<?php
include_once('config/constants.php'); #include the connection page
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="admin.css">
  </head>
  <body>
    <p>
      <?php
      $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());

      if( $conn == true) {
        //echo "connected successfully";
      }
      ?>
    </p>
    <div class="wrapper">
      <div class="title">Admin Login</div>
      <form action="#" method="post">
        <div class="field">
          <input type="text" name="admin_email" required>
          <label>Email Address</label>
        </div>
        <div class="field">
          <input type="password"  name="admin_pass" required>
          <label>Password</label>
        </div>
        <div class="content">
          <div class="checkbox">
            <input type="checkbox" id="remember-me">
            <label for="remember-me">Remember me</label>
          </div>
          <div class="pass-link"><a href="#">Forgot password?</a></div>
        </div>
        <div class="field">
          <input type="submit" name="submit" value="Login">
        </div>
      </form>
    </div>
  </body>
</html>


<?php
if (isset($_POST['submit'])) {
  echo "form submitted";

  $login_a= $_POST['admin_email'];
  $password_a= $_POST['admin_pass'];

  $conn= mysqli_connect(LOCALHOST, DB_USERNAME ,DB_PASSWORD) or die(mysqli_error());
/*
  if ($conn == true) {
    echo "database connected";
  } */

//select database
$db_select = mysqli_select_db($conn, DB_NAME);
//check whether this is connected or not

if ($db_select == true) {
  echo "database Selected";
}

//fetching data from sql
$query= mysqli_query($conn, "SELECT * FROM admin_login WHERE login_a='$login_a' AND password_a= '$password_a'");

//checking whether the data matches or not
$rows = mysqli_num_rows($query);
if($rows==1) {
  $_SESSION["admin_login"] = $login_a;
  $_SESSION["admin_pass"] = $password_a;

  header('location: admin_dashboard.php');
}
else {
   /* $error = "enter right credentials";
    echo $error; } */
   echo '<html><h2><em>Enter right credentials</em></h2></html>'; }






}

?>