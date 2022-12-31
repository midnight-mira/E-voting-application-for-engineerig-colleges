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
          <ul class="navbar-nav ml-auto animate__animated animate__bounceInDown" style="padding-right: 50px;">
            <li class="nav-item">
              <a class="nav-link" href="dashboard.html" style="color:white; font-weight: 600; text-align: center; font-size: 18px; margin-top: 20px;  text-transform: capitalize; padding: 20px;">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="vote_page.php" style="color: white; font-weight: 600; text-align: center; font-size: 18px; margin-top: 20px;  text-transform: capitalize; padding: 20px;">Candidate</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="result.php" style="color: white; font-weight: 600; text-align: center; font-size: 18px; margin-top: 20px;  text-transform: capitalize; padding: 20px;">Result</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="about.html" style="color: white; font-weight: 600; text-align: center; font-size: 18px; margin-top: 20px;  text-transform: capitalize; padding: 20px;">About</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="st_logout.php" style="color: white; font-weight: 600; text-align: center; font-size: 18px; margin-top: 20px;  text-transform: capitalize; padding: 20px;">Logout</a>
            </li>

            

          </ul>
        </div>
      </nav>
    </header>