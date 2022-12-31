<?php
include_once('config/constants.php');
session_start();
?>




<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="login.css">
</head>

<body>

  <p>
    <?php
    /*
    //Check whether the seeion is created or not
    if ($_SESSION) {
      //display message

      echo "Succesfullly";
      //remove the message after displaying once

    } */

    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

    //CHECK CONNECTION
    if ($conn === false) {
      die("ERROR" . mysqli_connect_error());
    }

    //echo "Connected Succesfully" . mysqli_get_host_info($conn);
    ?>
  </p>


  <div class="wrapper">
    <div class="title">Login Form</div>
    <form method="POST" action="#">
      <div class="field">
        <input type="text" name="email_id" required>
        <label>College Email Address</label>
      </div>
      <div class="field">
        <input type="password" name="password1" required>
        <label>Password</label>
      </div>
      <div class="content">
        <div class="checkbox">
          <input type="checkbox" id="remember-me">
          <label for="remember-me">Remember me</label>
        </div>
      </div>
      <div class="field">
        <input type="submit" name="submit" value="Login">
      </div>
      <div class="signup-link">Not a member? <a href="register.php">Signup to vote</a></div>
      <div class="signup-link"><a href="admin.php">Login as Admin</a></div>
    </form>
  </div>
</body>

</html>




<?php
//checks whether a form is submitted or not
if (isset($_POST['submit'])) {
  //echo "Form Submitted";


  //get the values from form and save itin avriable
  $email_id = $_POST['email_id'];
  $password1 = $_POST['password1'];


  //connect database
  $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());

  //Check whether the databas eis connected or not
  /*
  if ($conn == true) {
    echo "Database connected";
  } */



  //select database
  $db_select = mysqli_select_db($conn, DB_NAME);
  //check whether this is connected or not

  if ($db_select == true) {
    //echo "database Selected";
  }

  //Create a SESSION variable to Display the message
  $_SESSION['add'] = "added Succesfully";
  if(isset($_POST['remember-me'])){
       setcookie('emailcookie',$email_id,time()+86400);
       setcookie('passwordcookie',$password1,time()+86400);
     header('location:' . $SITEURL . 'login.php');   
   }
   else{
     header('location:' . $SITEURL . 'login.php');
   }

  $pass = mysqli_query($conn, "SELECT password_r_c FROM registration_f WHERE email_id_r='$email_id'");
  $hash = mysqli_fetch_assoc($pass);
  if (password_verify($password1, $hash['password_r_c'])) {
    $sql = mysqli_query($conn, "SELECT div_year, id FROM registration_f where email_id_r = '$email_id'");
    while ($fetch = mysqli_fetch_assoc($sql)) {
      $div_y = $fetch['div_year'];
      $v_id = $fetch['id'];
      $_SESSION["email"] = $email_id;
      $_SESSION["St_pass"] =$password1;
      $_SESSION["id"] = $v_id;
      $_SESSION["div_year"] = $div_y;
      header("location:vote_page.php");
    }
  } else {
    echo ('Email or Password not match');
  }

 






  /* 
  //fetching data from sql
  $info= "SELECT div_year FROM REGISTRATION_F WHERE email_id_r= '$email_id' and password_r = '$password1'";
  $query= mysqli_query($conn, $info );
  $infoo= mysqli_query($conn, "SELECT * FROM REGISTRATION_F WHERE email_id_r= '$email_id' and password_r = '$password1'" );
  $voter_info_retrieve= mysqli_fetch_assoc($infoo);
  $v_id= $voter_info_retrieve['id']; 
  $div_y= $voter_info_retrieve['div_year'];
  $_SESSION["email"]= $email_id;
  $_SESSION["id"]= $v_id;
  $_SESSION["div_year"]= $div_y;
  //header('location:cmpn.php'); */




  /*
   if($num > 0) {

    while($obj= mysqli_fetch_object($query)) {
      printf($obj->div_year);
      $meow=$obj->div_year;


     //CMPN  SECTION 
      if($meow=='FECMPN' || 'SECMPN'){
        header('location:fe_cmpn.php');
      } 
      elseif($meow=='SECMPN'){
        header('location:se_cmpn.php');
      }
      elseif($meow=='TECMPN'){
        header('location:te_cmpn.php');
      }
      elseif($meow=='BECMPN'){
        header('location:be_cmpn.php');
      } 
    

      //CIVIL SECTION
      elseif($meow=='SECMPN'){
        header('location:se_cmpn.php');
      }elseif($meow=='SECMPN'){
        header('location:se_cmpn.php');
      }elseif($meow=='SECMPN'){
        header('location:se_cmpn.php');
      }elseif($meow=='SECMPN'){
        header('location:se_cmpn.php');
      }

      //MECH SECTION
      elseif($meow=='SECMPN'){
        header('location:se_cmpn.php');
      }elseif($meow=='SECMPN'){
        header('location:se_cmpn.php');
      }elseif($meow=='SECMPN'){
        header('location:se_cmpn.php');
      }elseif($meow=='SECMPN'){
        header('location:se_cmpn.php');
      }

      //IT SECTION
      elseif($meow=='SECMPN'){
        header('location:se_cmpn.php');
      }
      elseif($meow=='SECMPN'){
        header('location:se_cmpn.php');
      }
      elseif($meow=='SECMPN'){
        header('location:se_cmpn.php');
      }
      elseif($meow=='SECMPN'){
        header('location:se_cmpn.php');
      }

      //ECS SECTION
      elseif($meow=='SECMPN'){
        header('location:se_cmpn.php');
      }
      elseif($meow=='SECMPN'){
        header('location:se_cmpn.php');
      }
      elseif($meow=='SECMPN'){
        header('location:se_cmpn.php');
      }
      elseif($meow=='SECMPN'){
        header('location:se_cmpn.php');
      }
    }
  }
    else{
      echo "<h3>Enter right credentials";
    } */
}
?>