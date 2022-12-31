<?php
require 'PHPMailerAutoload.php';
require 'credential.php';
include_once('config/constants.php');
session_start();

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
/*
$mail = new PHPMailer;

$mail->SMTPOptions = [
    'ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true,
    ]
];


$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp1.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = EMAIL;                 // SMTP username
$mail->Password = PASS;                          // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->Host = "ssl://smtp.gmail.com"; 
echo !extension_loaded('openssl')?"Not Available":"Available";

$mail->setFrom(EMAIL, 'Authentication');
$mail->addAddress($_SESSION["maill"], 'USER');     // Add a recipient
             // Name is optional
$mail->addReplyTo(EMAIL, 'Information');


//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'LOGIN USING THE LINK';
$mail->Body    = 'Please login using this link';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
} */ 
$email_id_r = $_SESSION["maill"];
$id = $_SESSION['id'];

$sql = mysqli_query($conn, "SELECT * FROM registration_s WHERE email_id_r = '$email_id_r' ");
$data = mysqli_fetch_assoc($sql);
$full_name = $data['full_name'];


$subject = "Email Verified";
$message = "Hi,$full_name.Your account has been verified. Click here to continue
    http://192.168.1.20/mini_project1/login.php";
$sender = "From:amirashaikh2406@gmail.com";
if (mail($email_id_r, $subject, $message, $sender)) {
  echo "success";
} else {
  echo  "Failed to send an Emial!";
}  

$accept = "INSERT INTO registration_f SELECT * FROM registration_s where id= $id";
$query = mysqli_query($conn, $accept);
if ($query == true) {
  $remove = mysqli_query($conn, "DELETE FROM registration_s WHERE id=$id ");
  header('location:admin_dashboard.php');
}
