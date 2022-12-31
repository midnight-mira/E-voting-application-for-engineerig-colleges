<?php
include_once('config/constants.php'); #include the connection page
session_start();
?>

<?php
$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD);
$select_db = mysqli_select_db($conn, DB_NAME);

$id = $_GET['idth'];
echo $id;
$_SESSION["id"] = $id;
$sql = "SELECT * FROM registration_s where id = $id";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
    $email = $row["email_id_r"];
    $_SESSION["maill"] = $email;
    header('location:email.php');

}

/*$accept= "INSERT INTO registration_f SELECT * FROM registration_s where id= $id";
$query= mysqli_query($conn, $accept);
if($query==true){
    $remove= mysqli_query($conn, "DELETE FROM registration_s WHERE id=$id ");
    header('location:admin_dashboard.php');
}*/



?>