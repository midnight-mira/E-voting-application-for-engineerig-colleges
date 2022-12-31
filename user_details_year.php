<?php 
include_once('config/constants.php'); #include the connection page
include('admin_navbar.php');
session_start();

$conn= mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME) or die (mysqli_error());
/*if($conn){
    echo "sonnected";
}*/


$select_db = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
/*if($select_db){
    echo "selected";
}*/

$sql= "SELECT * FROM registration_f";
$result= mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER INFO</title>
    <style>
        *{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
}
body{
    font-family: Helvetica;
    -webkit-font-smoothing: antialiased;
    background: white( 71, 147, 227, 1);
}
h1{
    text-align: center;
    font-size: 25px;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: #000000;
    padding: 30px 0;
}

/* Table Styles */

.table-wrapper{
    margin: 10px 70px 70px;
    box-shadow: 0px 35px 50px rgba( 0, 0, 0, 0.2 );
}

.fl-table {
    border-radius: 5px;
    font-size: 20px;
    font-weight: normal;
    border: none;
    border-collapse: collapse;
    width: 100%;
    max-width: 100%;
    white-space: nowrap;
    background-color: white;
}

.fl-table td, .fl-table th {
    text-align: center;
    padding: 15px;
}

.fl-table td {
    border-right: 1px solid #f8f8f8;
    font-size: 15px;
}

.fl-table thead th {
    color: #ffffff;
    background: #324960;
}


.fl-table thead th:nth-child(odd) {
    color: #ffffff;
    background: #324960;
}

.fl-table tr:nth-child(even) {
    background: #F8F8F8;
}

/* Responsive */

@media (max-width: 767px) {
    .fl-table {
        display: block;
        width: 100%;
    }
    .table-wrapper:before{
        content: "Scroll horizontally >";
        display: block;
        text-align: right;
        font-size: 15px;
        color: white;
        padding: 0 0 10px;
    }
    .fl-table thead, .fl-table tbody, .fl-table thead th {
        display: block;
    }
    .fl-table thead th:last-child{
        border-bottom: none;
    }
    .fl-table thead {
        float: left;
    }
    .fl-table tbody {
        width: auto;
        position: relative;
        overflow-x: auto;
    }
    .fl-table td, .fl-table th {
        padding: 20px .625em .625em .625em;
        height: 60px;
        vertical-align: middle;
        box-sizing: border-box;
        overflow-x: hidden;
        overflow-y: auto;
        width: 120px;
        font-size: 13px;
        text-overflow: ellipsis;
    }
    .fl-table thead th {
        text-align: left;
        border-bottom: 1px solid #f7f7f9;
    }
    .fl-table tbody tr {
        display: table-cell;
    }
    .fl-table tbody tr:nth-child(odd) {
        background: none;
    }
    .fl-table tr:nth-child(even) {
        background: transparent;
    }
    .fl-table tr td:nth-child(odd) {
        background: #F8F8F8;
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tr td:nth-child(even) {
        border-right: 1px solid #E6E4E4;
    }
    
}
    </style>
</head>
<body>
<h1>USERS INFORMATION</h1>
<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Year</th>
            <th>Roll No</th>
            <th>Email_Id</th>
            <th>EN_no</th>
            <th>Vote_Status</th>
        </tr>
        </thead>

        <?php
                                    if (mysqli_num_rows($result) > 0) {
                                        $sn = 1;
                                        while ($data = mysqli_fetch_assoc($result)) {
                                    ?>
        <tbody>
        <tr>
            <td><?php echo $data['id'];?></td>
            <td><?php echo $data['full_name'];?></td>
            <td><?php echo $data['div_year'];?></td>
            <td><?php echo $data['roll_no'];?></td>
            <td><?php echo $data['email_id_r'];?></td>
            <td><?php echo $data['en_no'];?></td>
            <td><?php echo $data['status1'];?></td>
        </tr>
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
    
</body>
</html>


