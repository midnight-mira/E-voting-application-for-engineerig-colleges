<?php
include_once('config/constants.php'); #include the connection page
?>

<?php
$conn= mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD);
$select_db= mysqli_select_db($conn, DB_NAME);

$id= $_GET['cdth'];

$query = mysqli_query($conn, "SELECT * from candidate where id = '$id'");
$email = mysqli_fetch_assoc($query);
$email_id_r = $email['email_id_r'];

$sql = mysqli_query($conn, "SELECT * FROM candidate WHERE email_id_r = '$email_id_r' ");
$data = mysqli_fetch_assoc($sql);
$full_name = $data['full_name'];

/*
$subject = "Candidate Request Accepted";
$message = "Hi, $full_name .Your candidate request has been accepted.login and view your profile at
    http://192.168.1.20/mini_project1/dashboard.html";
$sender = "From:amirashaikh2406@gmail.com";
if (mail($email_id_r, $subject, $message, $sender)) {
  echo "success";
} else {
  echo  "Failed to send an Email!";
} */

$accept= "INSERT INTO candidate_f SELECT * FROM candidate where id= $id";
$query= mysqli_query($conn, $accept);
if($query==true){
    $remove= mysqli_query($conn, "DELETE FROM candidate WHERE id=$id ");
}
header("location: admin_dashboard.php");

?>

