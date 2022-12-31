<?php
include_once('config/constants.php');
session_start();
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="register.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <div class="container">
    <div class="title">Apply For Candidate</div>
    <form action="#" method="POST" enctype="multipart/form-data">
      <div class="user-details">
        <div class="input-box">
          <span class="details">Full Name</span>
          <input type="text" name="name" placeholder="Enter your name" required>
        </div>
        <div class="input-box">
          <span class="details">Year & Branch</span>
          <input type="text" name="div_year" placeholder="Details" required>
        </div>
        <div class="input-box">
          <span class="details">Enter Your Roll Number</span>
          <input type="text" name="roll_no" placeholder="Enter your roll number" required>
        </div>
        <div class="input-box">
          <span class="details">College Email-Id</span>
          <input type="text" name="email_id_r" placeholder="Enter your email id" required>
        </div>
        <div class="input-box">
          <span class="details">Agenda</span>
          <textarea placeholder="Enter Your Message" name="agenda" rows="3" cols="45"></textarea>
        </div>
        Upload Your Profile Image:
        <input type="file" name="picture">
      </div>

      <div class="button">
        <input type="submit" name="Submit" value="Submit">
      </div>
    </form>
  </div>
  </div>

</body>

</html>

<?php
$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
$select_db = mysqli_select_db($conn, DB_NAME);
/*
if (isset($_POST['upload1'])) {

  $picture = $_FILES['picture']['name'];
  $tempname = $_FILES['picture']['tmp_name'];
  $pic = "INSERT INTO candidate ('picture')
                     VALUES('$picture')";

  $picque = mysqli_query($conn, $pic);
  if ($pic == true) {
    echo "successful";
  }
}*/


if (isset($_POST['Submit'])) {

  $name = $_POST['name'];
  $div_year = strtoupper($_POST['div_year']);
  $roll_no = $_POST['roll_no'];
  $email_id = $_POST['email_id_r'];
  $agenda = $_POST['agenda'];
  $file = $_FILES['picture'];

  $filename = $file['name'];
  $filepath = $file['tmp_name'];
  $fileerror = $file['error'];

  if ($fileerror == 0) {

    $destfile = './uploads/' . $filename;
    move_uploaded_file($filepath, $destfile);

    $pic = "INSERT INTO candidate (full_name, div_year, picture, roll_no, email_id_r, agenda)
                     VALUES('$name', '$div_year', '$destfile', '$roll_no', '$email_id', '$agenda')";

    $picque = mysqli_query($conn, $pic);
    if ($pic == true) {
      header('location:login.php');
    }
  }
}
?>
