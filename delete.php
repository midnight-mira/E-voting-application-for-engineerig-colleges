<?php
include_once('config/constants.php'); #include the connection page
?>

<?php
$conn= mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD);
$select_db= mysqli_select_db($conn, DB_NAME);

#for rejection 
$del= $_GET['delth'];


$query = mysqli_query($conn, "SELECT * from registration_s where id = '$del'");
$email = mysqli_fetch_assoc($query);
$email_id_r = $email['email_id_r'];

$sql = mysqli_query($conn, "SELECT * FROM registration_s WHERE email_id_r = '$email_id_r' ");
$data = mysqli_fetch_assoc($sql);
$full_name = $data['full_name'];


$subject = "Email Not Verified";
$message = "Hi,$full_name.Your account has not been verified. please try again at
    http://192.168.1.20/mini_project1/register.php";
$sender = "From:amirashaikh2406@gmail.com";
if (mail($email_id_r, $subject, $message, $sender)) {
  echo "success";
} else {
  echo  "Failed to send an Emial!";
}

$delth="DELETE FROM registration_s WHERE id= $del";
$delreq= mysqli_query($conn, $delth);
if($delreq== true){
    echo "deleted";
} 
header("location:admin_dashboard.php"); 

?>