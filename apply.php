<?php
include('config/constants.php');
session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>

  <!------------------  Required Meta Tags ------------------>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!------------------  Bootstrap css ------------------>

  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!------------------  FontAwesome CDN ------------------>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!--js-->

  <!------------------  Custom css------------------>

  <link rel="stylesheet" href="style.css">

  <!------------------  Fonts CDN ------------------>

  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

  <!------------------  Internal Css ------------------>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      scroll-behavior: smooth;
      text-align: center;
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>

<body>
  <!------------------  Navbar Section ------------------>
  <div class="container-fluid" id="cont-3">
    <header id="nav-bar">
      <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <a class="navbar-brand" href="dashboard.html" style="color: white; font-weight: 600; margin-top: 15px;">GO VOTE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon" style="color: white;"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto animate_animated animate_bounceInDown" style="padding-right: 50px;">
            <li class="nav-item">
              <a class="nav-link" href="dashboard.html" style="color:white; font-weight: 600; text-align: center; font-size: 18px; margin-top: 20px;  text-transform: capitalize; padding: 20px;">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="apply.php" style="color: white; font-weight: 600; text-align: center; font-size: 18px; margin-top: 20px;  text-transform: capitalize; padding: 20px;">Candidate</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="result.php" style="color: white; font-weight: 600; text-align: center; font-size: 18px; margin-top: 20px;  text-transform: capitalize; padding: 20px;">Result</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="about.php" style="color: white; font-weight: 600; text-align: center; font-size: 18px; margin-top: 20px;  text-transform: capitalize; padding: 20px;">About</a>
            </li>

          </ul>
        </div>
      </nav>
    </header>

    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
    </head>

    <body>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <form method="POST" action="#">
              <button style="margin-top:60px;"type="submit" name="view-candidate" type="button" class="btn btn-danger btn-lg">View Candidate</button>
            </form>
          </div>

          <div class="col">
            <form method="POST" action="candidate.php">
              <button style="margin-top:60px;" name="apply" type="vote" class="btn btn-danger btn-lg">Apply as Candidate</button>
            </form>

          </div>
        </div>

    </body>

    </html>

    <?php

    $conn= mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD);
    $db_select= mysqli_select_db($conn, DB_NAME);

    if (isset($_POST['view-candidate'])) {
      echo "success";
      $div = $_SESSION["div_year"];
      $sql= "SELECT * FROM candidate_f WHERE div_year= '$div'";
      $query= mysqli_query($conn, $sql);
      header('location:vote_page.php');
    }


    ?>