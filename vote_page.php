<?php
include_once('config/constants.php'); #include the connection page
session_start();




?>

<?php
$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD);
$select_db = mysqli_select_db($conn, DB_NAME);
$div= $_SESSION["div_year"];

$sql = "SELECT * FROM candidate_f WHERE div_year='$div'";
$query = mysqli_query($conn, $sql);

$div=$_SESSION["div_year"];


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
          <ul class="navbar-nav ml-auto animate__animated animate__bounceInDown" style="padding-right: 50px;">
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
              <a class="nav-link" href="about.html" style="color: white; font-weight: 600; text-align: center; font-size: 18px; margin-top: 20px;  text-transform: capitalize; padding: 20px;">About</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="st_logout.php" style="color: white; font-weight: 600; text-align: center; font-size: 18px; margin-top: 20px;  text-transform: capitalize; padding: 20px;">Logout</a>
            </li>

          </ul>
        </div>
      </nav>
    </header>
    <div class="container">

      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center">

            <p class="text-center" style="margin-bottom: 50px;">Candidates</p>
        </div>

        <!-- Card Start -->
        <?php
        if (mysqli_num_rows($query) > 0) {
          $sn = 1;
          while ($data = mysqli_fetch_assoc($query)) {
        ?>
            <div class="col-md-3 " style=" margin-left:25px; padding-top: 30px;">
              <div class="card" style="width: 18rem;">
                <img src="<?php echo $data['picture']; ?>" alt="image here" height="350px">
                <div class="card-body">
                  <h2 class="card-title"><?php echo "Name: ". $data['full_name'] ?></h2>
                  <p class="card-text"><?php echo "Roll No: ". $data['roll_no'] ?></p>
                  <p class="card-text"><?php echo "DESCRIPTION: ".$data['agenda'] ?></p>
                  <form action="#" method="post">
                    <button type="vote" name="vote" class="btn btn-outline-success btn lg"><a href="cvote.php?cvote=<?php echo $data['id']; ?>">Vote</a></button>
                    <input type="hidden" >
                  </form>
                </div>
              </div>
            </div>
          <?php
            $sn++;
          }
        } else { ?>
          <tr>
            <td colspan="23">No data found</td>
          </tr>
        <?php } ?>




        <!-- Card End -->

      </div>
    </div>
    </section>
    <!------------------  Footer Section ------------------>

    <section>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <hr>
            <div class="Footer">
              <ul style="display: flex;">
                <li style="list-style: none; padding: 10px; "><a href="index.html" style="color: red; font-weight: 600;">Shree L.R. Tiwari College Of Engineering</a></li>
              </ul>
            </div>
          </div>
    </section>
</body>

</html>