<?php
include_once('config/constants.php'); #include the connection page
session_start();
?>

<?php
$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
/*if ($conn == true){
  echo "Connected Succesfully";
}*/

//select db
$select_db = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());

$sql = "SELECT * FROM registration_s"; //table connect
$result = mysqli_query($conn, $sql);
/* if($result==true){
  echo "success";
}*/
$nums = mysqli_num_rows($result);




/* Candidate query */
$sql1 = "SELECT * FROM candidate";
$result1 = mysqli_query($conn, $sql1);
$nums1 = mysqli_num_rows($result1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN DASHBOARD</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <title></title>
    <style>
        .container-fluid {
            overflow: auto;
        }
    </style>
    <link href="css/mobiscroll.javascript.min.css" rel="stylesheet" />
    <script src="js/mobiscroll.javascript.min.js"></script>
</head>

<body>
    <div class="container-fluid" id="cont-3">

        <header id="nav-bar">
            <nav class="navbar navbar-expand-lg navbar-light bg-dark">
                <a class="navbar-brand" href=index.html style="color: white; font-weight: 600; margin-top: 15px;">Shree L.R. Tiwari College Of Engineering</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon" style="color: white;"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto animate_animated animate_bounceInDown" style="padding-right: 50px;">
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.html" style="color:white; font-weight: 600; text-align: center; font-size: 18px; margin-top: 20px;  text-transform: capitalize; padding: 20px;">Dashboard</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="user_details_year.php" style="color: white; font-weight: 600; text-align: center; font-size: 18px; margin-top: 20px;  text-transform: capitalize; padding: 20px;">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user_cand_year.php" style="color: white; font-weight: 600; text-align: center; font-size: 18px; margin-top: 20px;  text-transform: capitalize; padding: 20px;">Candidates</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="logout.php" style="color: white; font-weight: 600; text-align: center; font-size: 18px; margin-top: 20px;  text-transform: capitalize; padding: 20px;">Logout</a>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 style="margin-top: 15px;">ADMIN DASHBOARD</h1>
                        <br>
                        <br>
                        <div class="card">
                            <div class="card-header">
                                Students Request
                            </div>
                            <div class="card-body">

                                <table class="table table-dark table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">S.N</th>
                                            <th scope="col">Full Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Class And Dept</th>
                                            <th scope="col">Roll_no</th>
                                            <th scope="col">Enrollment no</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    if (mysqli_num_rows($result) > 0) {
                                        $sn = 1;
                                        while ($data = mysqli_fetch_assoc($result)) {
                                    ?>
                                            <tbody>
                                                <tr>
                                                    <th><?php echo $sn; ?></th>
                                                    <td><?php echo $data['full_name']; ?> </td>
                                                    <td><?php echo $data['email_id_r']; ?> </td>
                                                    <td><?php echo $data['div_year']; ?> </td>
                                                    <td><?php echo $data['roll_no']; ?></td>
                                                    <td><?php echo $data['en_no']; ?> </td>

                                                    <td>
                                                        <form action="#" method="POST">
                                                            <button type="accept" name="accept" class="btn btn-success"><a href="accept.php?idth=<?php echo $data['id']; ?>">Accept</a></button>
                                                        </form>
                                                    </td>

                                                    <td>
                                                        <form action="#" method="post">
                                                            <button type="reject" name="reject" class="btn btn-danger"><a href="delete.php?delth=<?php echo $data['id']; ?>">Reject</a></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                <tr>
                                                <?php
                                                $sn++;
                                            }
                                        } else { ?>
                                                <tr>
                                                    <td colspan="23">No data found</td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <br>
        <br>


        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">

                                Candidate Request
                            </div>
                            <div class="card-body">

                                <table class="table table-dark table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">S.N</th>
                                            <th scope="col">Full Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Class And Dept</th>
                                            <th scope="col">Roll_no</th>
                                            <th scope="col">Agenda</th>
                                            <th scope="col">photo</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    if (mysqli_num_rows($result1) > 0) {
                                        $sn = 1;
                                        while ($data = mysqli_fetch_assoc($result1)) {
                                    ?>
                                            <tbody>
                                                <tr>
                                                    <th><?php echo $sn; ?></th>
                                                    <td><?php echo $data['full_name']; ?> </td>
                                                    <td><?php echo $data['email_id_r']; ?> </td>
                                                    <td><?php echo $data['div_year']; ?> </td>
                                                    <td><?php echo $data['roll_no']; ?></td>
                                                    <td><?php echo $data['agenda']; ?> </td>
                                                    <td><img src=" <?php echo $data['picture']; ?>" height="100px" width="100px"> </td>


                                                    <td>
                                                        <form action="#" method="POST">
                                                            <button type="accept" name="accept" class="btn btn-success"><a href="caccept.php?cdth=<?php echo $data['id']; ?>">Accept</a></button>
                                                        </form>
                                                    </td>

                                                    <td>
                                                        <form action="#" method="post">
                                                            <button type="reject" name="reject" class="btn btn-danger"><a href="cdelete.php?cdelth=<?php echo $data['id']; ?>">Reject</a></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                <tr>
                                                <?php
                                                $sn++;
                                            }
                                        } else { ?>
                                                <tr>
                                                    <td colspan="23">No data found</td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="demo"></div>
                <div id="demo-timegrid"></div>
                <script>
                    mobiscroll.setOptions({
                        theme: 'ios',
                        themeVariant: 'light'
                    });


                    mobiscroll.datepicker('#demo-timegrid', {
                        controls: ['calendar', 'timegrid'],
                        display: 'inline'
                    });
                </script>
                <form action="#" method="post">
                    <label for="date">Enter Date:</label><br>
                    <input type="datetime" name="date" id="date" placeholder="7 April 2022, 18:09:00">
                    <div class="field">
                        <input type="submit" name="submit" value="submit">
                    </div>
                </form>
        </section>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
    $date = $_POST['date'];
}

//Create a SESSION variable to Display the message
$_SESSION['add'] = "added Succesfully";
if(isset($_POST['submit'])){
     setcookie('datecookie',$date,time()+86400);
     $_SESSION["days"] = $date;
 }
 else{
   
 }


/*
        while ($data = mysqli_fetch_assoc($result)) {
            $move = "INSERT INTO registration_f SELECT * FROM registration_s where id=" . $id;
            $copy = mysqli_query($conn, $move);
            if ($copy == true) {
                echo "successful";
            }
        }/*
    } /*
    $move = "INSERT INTO registration_f SELECT * FROM registration_s where roll_no='$mo'";
    $copy = mysqli_query($conn, $move);
    if ($copy == true) {
        echo "successful";
    }*/ /*
}
    }*/
#for acceptance of request.............
/*
    $id= $_GET['idth'];

    $accept= "INSERT INTO registration_f SELECT * FROM registration_s where id= $id";
    $query= mysqli_query($conn, $accept);
    if($query==true){
        $autoremove=mysqli_query($conn, "DELETE FROM registration_s WHERE id= $id");
        header("location: admin_dashboard.php");
    }
    #..................................*/
/*
    #for rejection 
    $del= $_GET['delth'];
    $delth="DELETE FROM registration_s WHERE id= $del";
    $delreq= mysqli_query($conn, $delth);
    if($delreq== true){
        echo "deleted";
        header("location:admin_dashboard.php");
    } */


?>