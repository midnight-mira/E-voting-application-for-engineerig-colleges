<?php
// includes the connection file.
include('config/constants.php');
?>




<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="register.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

  <p>
    <?php

    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

    //CHECK CONNECTION
    if ($conn === false) {
      die("ERROR" . mysqli_connect_error());
    }

    // echo "Connected Succesfully" . mysqli_get_host_info($conn);
    ?>
  </p>


  <div class="container">
    <div class="title">Student Registration Form</div>

    <div class="content">
      <form method="POST">


        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" name="full_name" placeholder="Enter your name" required>
          </div>

          <div class="input-box">
            <span class="details" class="pass">Division & Year</span>
            <input type="text" name="div_year" placeholder="Ex. SECMPN" required>
          </div>

          <div class="input-box">
            <span class="details">Class Roll Number</span>
            <input type="text" name="roll_no" placeholder="Enter your roll number" required>
          </div>

          <div class="input-box">
            <span class="details">College Email-Id</span>
            <input type="text" name="email_id_r" placeholder="Enter your email id" required>
          </div>

          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="password_r" placeholder="Enter your password " required>
          </div>

          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" name="password_r_c" placeholder="Confirm your password" required>
          </div>

          <div class="input-box">
            <span class="details">Enrollment No</span>
            <input type="text" maxlength="12" name="en_no" placeholder="Fill in your 12 digit Enrollment No:" required>
          </div>

        </div>

        <div class="button">
          <input type="submit" name="submit" value="Register">
          <div class="signup-link">Already a member <a href="login.php">Login</a></div>
        </div>

      </form>
    </div>
  </div>

</body>

</html>


<?php



//Connect to the database
$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD);
if ($conn == true) {
  // echo "Succesfully Connected";
}

//form submitted or not
if (isset($_POST['submit'])) {
  //echo "Form Submitted";
  //get the values from form and save itin avriable
  $full_name = $_POST['full_name'];
  $div_year = strtoupper($_POST[('div_year')]);
  $roll_no = $_POST['roll_no'];
  $email_id_r = $_POST['email_id_r'];
  $password_r = $_POST['password_r'];
  $password_r_c = $_POST['password_r_c'];
  $en_no = $_POST['en_no'];
  $status1 = 0;

  $hash = password_hash($password_r_c, PASSWORD_DEFAULT);


  $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME) or die(mysqli_error());
  //check if it is connected

  if ($conn == true) {
    //echo "Database connected";
  }

  $db_select = mysqli_select_db($conn, DB_NAME);
  //check whether this is connected or not

  if ($db_select == true) {
    // echo "database Selected";
  }

  $email_query = "Select * from registration_f where email_id_r='$email_id_r'";
  $query = mysqli_query($conn, $email_query);
  $email_count = mysqli_num_rows($query);
  if ($email_count > 0) {
    echo "email already Exists";
  } else {
    if ($_POST['password_r'] !== $_POST['password_r_c']) {
      die("password and confirm password should match");
    }



    if (!filter_var($email_id_r, FILTER_VALIDATE_EMAIL)) {
      die("Invalid Email Format");
    }
    /*
    if (!preg_match("/^[a-zA-Z-' ]*$/", $full_name)) {
      die("Only letters and white space allowed");
    } */


    //Insert data into databse
    $sql = "INSERT INTO registration_s SET 
        full_name = '$full_name',
        div_year = '$div_year',
        roll_no = '$roll_no',
        email_id_r = '$email_id_r',
        password_r = '$hash',
        password_r_c = '$hash',
        en_no = '$en_no'
        ";




    //Execute query and insert into databse
    $res = mysqli_query($conn, $sql);

    //check whether the query is executed or not
    if ($res == true) {
      //Data Inserted successfully
      echo "Data inserted";
      header('location:' . 'applied_sucess.html');
    }
  }
}
?>