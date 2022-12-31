<?php
include_once('config/constants.php'); #include the connection page
session_start();
?>

<?php
$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD);
$select_db = mysqli_select_db($conn, DB_NAME);
$query = mysqli_query($conn, "SELECT * from candidate_f ");
$voter_table = mysqli_query($conn, "SELECT * from registration_f ");
$voter_info = mysqli_fetch_assoc($voter_table);
# echo $votes;

# echo $total_votes;
$v_id = $voter_info['id'];

$voter_id= $_SESSION["id"];
$id = $_GET['cvote'];
$data = mysqli_fetch_assoc($query);
$votes = $data['votes'];
if ($voter_info['status1'] == 1) {
   echo "<script>
     alert('you cant vote');
    </script>";
    header("location:vote_page.php");
} 

else {
    $total_votes = $votes + 1;
    $accept = "UPDATE candidate_f SET votes = '$total_votes' WHERE id = '$id'";
    $update = mysqli_query($conn, $accept);
    $status=1;
    if ($update == true) {
        $status = mysqli_query($conn, "UPDATE registration_f SET status1= '$status' WHERE id='$voter_id'");
        header("location:sucess_vote.html");
    }
    /*
$accept = "UPDATE candidate_f SET votes=? WHERE id=?";
$stmt= $conn->prepare($accept);
$stmt->bind_param($total_votes, $id);
$stmt->execute(); */
}



?>